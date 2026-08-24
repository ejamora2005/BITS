import './bootstrap';

const revealElements = document.querySelectorAll('[data-reveal]');

if (revealElements.length > 0) {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.18 },
    );

    revealElements.forEach((element) => observer.observe(element));
}

const instructorCarousel = document.querySelector('[data-instructor-carousel]');

if (instructorCarousel) {
    const slides = [...instructorCarousel.querySelectorAll('[data-carousel-slide]')];
    const previousButton = document.querySelector('[data-carousel-prev]');
    const nextButton = document.querySelector('[data-carousel-next]');
    const slideButtons = [...instructorCarousel.querySelectorAll('[data-carousel-to]')];
    let activeIndex = 0;
    let timerId;

    const showSlide = (index) => {
        activeIndex = (index + slides.length) % slides.length;

        slides.forEach((slide, slideIndex) => {
            slide.classList.toggle('is-active', slideIndex === activeIndex);
        });
    };

    const startTimer = () => {
        window.clearInterval(timerId);
        timerId = window.setInterval(() => showSlide(activeIndex + 1), 6200);
    };

    previousButton?.addEventListener('click', () => {
        showSlide(activeIndex - 1);
        startTimer();
    });

    nextButton?.addEventListener('click', () => {
        showSlide(activeIndex + 1);
        startTimer();
    });

    slideButtons.forEach((button) => {
        button.addEventListener('click', () => {
            showSlide(Number(button.dataset.carouselTo));
            startTimer();
        });
    });

    showSlide(0);
    startTimer();
}

const vaultTabs = [...document.querySelectorAll('[data-vault-tab]')];
const vaultPanels = [...document.querySelectorAll('[data-vault-panel]')];

if (vaultTabs.length > 0 && vaultPanels.length > 0) {
    vaultTabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            const activePanel = tab.dataset.vaultTab;

            vaultTabs.forEach((item) => {
                item.classList.toggle('is-active', item === tab);
            });

            vaultPanels.forEach((panel) => {
                panel.classList.toggle('is-active', panel.dataset.vaultPanel === activePanel);
            });
        });
    });
}

const articleCards = [...document.querySelectorAll('[data-article-card]')];
const articleFilters = [...document.querySelectorAll('[data-article-filter]')];
const articleSearch = document.querySelector('[data-article-search]');
const articleCount = document.querySelector('[data-article-count]');
const articleEmpty = document.querySelector('[data-article-empty]');

if (articleCards.length > 0) {
    let activeCategory = 'all';

    const updateArticles = () => {
        const query = (articleSearch?.value || '').trim().toLowerCase();
        let visibleCount = 0;

        articleCards.forEach((card) => {
            const categoryMatches = activeCategory === 'all' || card.dataset.articleCategory === activeCategory;
            const textMatches = !query || (card.dataset.articleTitle || '').includes(query);
            const shouldShow = categoryMatches && textMatches;

            card.hidden = !shouldShow;

            if (shouldShow) {
                visibleCount += 1;
            }
        });

        if (articleCount) {
            articleCount.textContent = `${visibleCount} ${visibleCount === 1 ? 'article' : 'articles'}`;
        }

        if (articleEmpty) {
            articleEmpty.hidden = visibleCount > 0;
        }
    };

    articleFilters.forEach((button) => {
        button.addEventListener('click', () => {
            activeCategory = button.dataset.articleFilter || 'all';

            articleFilters.forEach((item) => {
                const isActive = item === button;
                item.classList.toggle('is-active', isActive);
                item.setAttribute('aria-pressed', isActive ? 'true' : 'false');
            });

            updateArticles();
        });
    });

    articleSearch?.addEventListener('input', updateArticles);
    updateArticles();
}

const projectModal = document.querySelector('[data-project-modal]');
const projectInfoButtons = [...document.querySelectorAll('[data-project-info]')];

if (projectModal && projectInfoButtons.length > 0) {
    const modalLogo = projectModal.querySelector('[data-project-modal-logo]');
    const modalTitle = projectModal.querySelector('[data-project-modal-title]');
    const modalStatus = projectModal.querySelector('[data-project-modal-status]');
    const modalMeta = projectModal.querySelector('[data-project-modal-meta]');
    const modalDeveloper = projectModal.querySelector('[data-project-modal-developer]');
    const modalDescription = projectModal.querySelector('[data-project-modal-description]');
    const modalLink = projectModal.querySelector('[data-project-modal-link]');
    const closeButtons = [...projectModal.querySelectorAll('[data-project-modal-close]')];

    const setModalOpen = (isOpen) => {
        projectModal.classList.toggle('is-open', isOpen);
        projectModal.setAttribute('aria-hidden', String(!isOpen));
        document.body.classList.toggle('has-project-modal', isOpen);
    };

    projectInfoButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const { title, status, meta, developer, description, logo, url } = button.dataset;

            if (modalLogo) {
                modalLogo.src = logo || '';
                modalLogo.alt = title ? `${title} logo` : '';
            }

            if (modalTitle) modalTitle.textContent = title || '';
            if (modalStatus) modalStatus.textContent = status || '';
            if (modalMeta) modalMeta.textContent = meta || '';
            if (modalDeveloper) modalDeveloper.textContent = developer || '';
            if (modalDescription) modalDescription.textContent = description || '';

            if (modalLink) {
                modalLink.href = url || '#';
            }

            setModalOpen(true);
        });
    });

    closeButtons.forEach((button) => {
        button.addEventListener('click', () => setModalOpen(false));
    });

    window.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && projectModal.classList.contains('is-open')) {
            setModalOpen(false);
        }
    });
}

const instructorModal = document.querySelector('[data-instructor-modal]');
const instructorInfoButtons = [...document.querySelectorAll('[data-instructor-info]')];

if (instructorModal && instructorInfoButtons.length > 0) {
    const modalImage = instructorModal.querySelector('[data-instructor-modal-image]');
    const modalName = instructorModal.querySelector('[data-instructor-modal-name]');
    const modalRole = instructorModal.querySelector('[data-instructor-modal-role]');
    const modalEducation = instructorModal.querySelector('[data-instructor-modal-education]');
    const modalExpertise = instructorModal.querySelector('[data-instructor-modal-expertise]');
    const closeButtons = [...instructorModal.querySelectorAll('[data-instructor-modal-close]')];

    const setModalOpen = (isOpen) => {
        instructorModal.classList.toggle('is-open', isOpen);
        instructorModal.setAttribute('aria-hidden', String(!isOpen));
        document.body.classList.toggle('has-project-modal', isOpen);
    };

    instructorInfoButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const { name, role, education, expertise, image } = button.dataset;

            if (modalImage) {
                modalImage.src = image || '';
                modalImage.alt = name || '';
            }

            if (modalName) modalName.textContent = name || '';
            if (modalRole) modalRole.textContent = role || '';
            if (modalEducation) modalEducation.textContent = education || '';
            if (modalExpertise) modalExpertise.textContent = expertise || '';

            setModalOpen(true);
        });
    });

    closeButtons.forEach((button) => {
        button.addEventListener('click', () => setModalOpen(false));
    });

    window.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && instructorModal.classList.contains('is-open')) {
            setModalOpen(false);
        }
    });
}

const chatbot = document.querySelector('[data-chatbot]');

if (chatbot) {
    const toggleButton = chatbot.querySelector('[data-chatbot-toggle]');
    const closeButton = chatbot.querySelector('[data-chatbot-close]');
    const panel = chatbot.querySelector('[data-chatbot-panel]');
    const form = chatbot.querySelector('[data-chatbot-form]');
    const input = chatbot.querySelector('[data-chatbot-input]');
    const messages = chatbot.querySelector('[data-chatbot-messages]');
    const promptStrip = chatbot.querySelector('.chatbot-prompts');
    const promptButtons = [...chatbot.querySelectorAll('[data-chat-prompt]')];
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
    const botImage = chatbot.dataset.botImage;
    const history = [];
    const developerReply = [
        'Tech Team ni Pilato created this BITS website as a student academic project for the organization.',
        '',
        'We are BSIT Major in Programming students from SLSU Bontoc Campus. Our 4th year developers are Emil Jon Amora, Ahnjellou Gesulga, and John Mark Yecyec, while our 3rd year developers are Wyndel Medina, Rogelniño Mondido Fe Inal, Jericho Kuizon, and Kevin Lozada.',
    ].join('\n');
    const localReplies = new Map([
        [
            'who developed this website?',
            developerReply,
        ],
        [
            'who are the developers of this website?',
            developerReply,
        ],
    ]);

    const setOpen = (isOpen) => {
        chatbot.classList.toggle('is-open', isOpen);
        panel?.setAttribute('aria-hidden', String(!isOpen));

        if (isOpen) {
            window.setTimeout(() => input?.focus(), 160);
        }
    };

    const addMessage = (text, role, isLoading = false) => {
        const isUser = role === 'user';
        const message = document.createElement('div');
        message.className = `chat-message ${isUser ? 'user' : 'bot'}${isLoading ? ' loading' : ''}`;

        if (!isUser) {
            const avatar = document.createElement('span');
            avatar.className = 'chat-message-avatar';

            const image = document.createElement('img');
            image.src = botImage;
            image.alt = '';
            avatar.append(image);
            message.append(avatar);
        }

        const bubble = document.createElement('div');
        bubble.className = 'chat-bubble';

        if (isLoading) {
            const typing = document.createElement('div');
            typing.className = 'typing-indicator';
            typing.innerHTML = '<span></span><span></span><span></span>';
            bubble.append(typing);
        } else {
            const paragraph = document.createElement('p');
            paragraph.textContent = text;
            bubble.append(paragraph);
            message.textElement = paragraph;
        }

        message.append(bubble);
        messages?.append(message);
        messages.scrollTop = messages.scrollHeight;

        return message;
    };

    const cleanBotReply = (reply) => String(reply)
        .replace(/\\\*/g, '')
        .replace(/\*\*(.*?)\*\*/g, '$1')
        .replace(/^\s*[-*]\s+/gm, '')
        .trim();

    const typeBotReply = async (reply) => {
        const cleanReply = cleanBotReply(reply);
        const typedMessage = addMessage('', 'model');
        const delay = cleanReply.length > 500 ? 3 : 8;

        for (const character of cleanReply) {
            typedMessage.textElement.textContent += character;
            messages.scrollTop = messages.scrollHeight;
            await new Promise((resolve) => window.setTimeout(resolve, delay));
        }

        return typedMessage;
    };

    const hidePrompts = () => {
        chatbot.classList.add('has-chat-started');
        promptStrip?.setAttribute('aria-hidden', 'true');
        promptButtons.forEach((button) => {
            button.disabled = true;
            button.tabIndex = -1;
        });
    };

    const remember = (role, text) => {
        history.push({ role, text });

        if (history.length > 8) {
            history.shift();
        }
    };

    const sendMessage = async (text) => {
        const message = text.trim();

        if (!message) {
            return;
        }

        setOpen(true);
        hidePrompts();
        addMessage(message, 'user');
        remember('user', message);
        input.value = '';
        input.disabled = true;
        form.querySelector('button').disabled = true;

        const normalizedMessage = message.toLowerCase();
        const localReply = localReplies.get(normalizedMessage)
            ?? (/(developer|developed|creator|created|made|programmer)/u.test(normalizedMessage) ? developerReply : null);

        if (localReply) {
            await typeBotReply(localReply);
            remember('model', localReply);
            input.disabled = false;
            form.querySelector('button').disabled = false;
            input.focus();

            return;
        }

        const loadingMessage = addMessage('', 'model', true);

        try {
            const response = await fetch('/bits-chatbot', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    message,
                    history: history.slice(0, -1),
                }),
            });

            const data = await response.json();
            const reply = data.reply || 'No answer was returned.';

            loadingMessage.remove();
            await typeBotReply(reply);
            remember('model', reply);
        } catch (error) {
            loadingMessage.remove();
            const fallbackReply = 'The chatbot could not connect right now. Please try again.';
            await typeBotReply(fallbackReply);
        } finally {
            input.disabled = false;
            form.querySelector('button').disabled = false;
            input.focus();
        }
    };

    toggleButton?.addEventListener('click', () => {
        setOpen(!chatbot.classList.contains('is-open'));
    });

    closeButton?.addEventListener('click', () => setOpen(false));

    promptButtons.forEach((button) => {
        button.addEventListener('click', () => sendMessage(button.dataset.chatPrompt || ''));
    });

    form?.addEventListener('submit', (event) => {
        event.preventDefault();
        sendMessage(input?.value || '');
    });
}
