 {{-- LEFT: Online photographic slider --}}
    <section id="storySlider" class="visual-panel" aria-label="Discover {{ basicSystemInfo()->association_acronym }}" aria-roledescription="carousel">
        <header class="visual-header">
            <a href="{{ url('/') }}" class="brand" aria-label="{{ basicSystemInfo()->association_acronym }} home">
                <span class="logo-frame">
                    <img src="{{ associationLogo() }}" alt="" width="50" height="50">
                </span>

                <span>
                    <span class="brand-name">{{ basicSystemInfo()->association_acronym }}</span>

                    <span class="brand-subtitle">
                       {{ basicSystemInfo()->association_name }}
                    </span>
                </span>
            </a>

            <a href="{{ url('/') }}" class="header-link text-decoration-none">
                Back to homepage

                <svg class="icon" aria-hidden="true">
                    <use href="#arrow-up-right"></use>
                </svg>
            </a>
        </header>

        <div class="slides">
            {{-- Slide 1 --}}
            <article id="slide0" class="slide is-active" role="group" aria-roledescription="slide" aria-label="1 of 3"
                aria-hidden="false" data-caption="A community built around people.">
                <img src="https://d2u1z1lopyfwlx.cloudfront.net/thumbnails/35def884-34e7-526d-8f91-d32d629ff7b3/0594a430-36c9-5743-85c1-ba67ecd8a10d.jpg"
                    alt="" class="slide-image" style="object-position: 50% center;" fetchpriority="high"
                    decoding="async" aria-hidden="true">

                <div class="slide-overlay"></div>

                <div class="slide-content">
                    <p class="slide-eyebrow">Connection comes first</p>

                    <h2 class="slide-title">
                        Find your people.
                        <span>Build your future.</span>
                    </h2>

                    <p class="slide-description">
                        A community of shared ambition, meaningful
                        relationships, and new possibilities.
                    </p>
                </div>
            </article>

            {{-- Slide 2 --}}
            <article id="slide1" class="slide" role="group" aria-roledescription="slide" aria-label="2 of 3"
                aria-hidden="true" data-caption="Ideas become stronger when we share them.">
                <img src="https://d2u1z1lopyfwlx.cloudfront.net/thumbnails/39e1ec95-85b1-53a1-9442-8cee8e97d38e/c812ee79-8743-550a-bd9d-791a37da067f.jpg"
                    alt="" class="slide-image" style="object-position: 55% center;" decoding="async"
                    aria-hidden="true">

                <div class="slide-overlay"></div>

                <div class="slide-content">
                    <p class="slide-eyebrow">Shared opportunity</p>

                    <h2 class="slide-title">
                        Your next idea.
                        <span>Our next chapter.</span>
                    </h2>

                    <p class="slide-description">
                        Bring your perspective. Discover opportunities.
                        Move forward with a community beside you.
                    </p>
                </div>
            </article>

            {{-- Slide 3 --}}
            <article id="slide2" class="slide" role="group" aria-roledescription="slide" aria-label="3 of 3"
                aria-hidden="true" data-caption="Better connections. Greater possibilities.">
                <img src="https://d2u1z1lopyfwlx.cloudfront.net/thumbnails/e7bebbc2-e2da-5697-8bcd-bec88f459eb5/3cb059b3-e901-51c5-8425-e794cb6c299b.jpg"
                    alt="" class="slide-image" style="object-position: 60% center;" decoding="async"
                    aria-hidden="true">

                <div class="slide-overlay"></div>

                <div class="slide-content">
                    <p class="slide-eyebrow">Progress, together</p>

                    <h2 class="slide-title">
                        Different strengths.
                        <span>One shared purpose.</span>
                    </h2>

                    <p class="slide-description">
                        Connect, contribute, and become part of a
                        future we are building together.
                    </p>
                </div>
            </article>
        </div>

        <div class="visual-footer">
            <div class="footer-top">
                <span id="slideCaption" class="slide-caption">
                    A community built around people.
                </span>

                <div id="sliderControls" class="slider-controls" hidden>
                    <button id="previousSlide" type="button" class="control-button" aria-label="Previous slide">
                        <svg class="icon" aria-hidden="true">
                            <use href="#chevron-left"></use>
                        </svg>
                    </button>

                    <button id="toggleAutoplay" type="button" class="control-button" aria-label="Pause slideshow">
                        <svg class="icon" aria-hidden="true">
                            <use id="autoplayIcon" href="#pause"></use>
                        </svg>
                    </button>

                    <button id="nextSlide" type="button" class="control-button" aria-label="Next slide">
                        <svg class="icon" aria-hidden="true">
                            <use href="#chevron-right"></use>
                        </svg>
                    </button>
                </div>
            </div>

            <div id="sliderPagination" class="pagination" hidden>
                <button type="button" class="slide-dot is-active" data-slide="0" aria-label="Show community slide"
                    aria-controls="slide0" aria-current="true"></button>

                <button type="button" class="slide-dot" data-slide="1" aria-label="Show opportunity slide"
                    aria-controls="slide1" aria-current="false"></button>

                <button type="button" class="slide-dot" data-slide="2" aria-label="Show collaboration slide"
                    aria-controls="slide2" aria-current="false"></button>

                <span class="slide-count" aria-hidden="true">
                    <span id="slideNumber" class="slide-count-current">01</span>
                    / 03
                </span>
            </div>
        </div>

        <span id="slideAnnouncement" class="sr-only" role="status" aria-live="polite"></span>
    </section>
