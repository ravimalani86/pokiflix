(() => {
  const header = document.querySelector(".site-header");
  const toggle = document.querySelector(".menu-toggle");
  const mobileNav = document.querySelector(".nav-mobile");
  const navLinks = document.querySelectorAll(".site-nav a");
  const sections = [...document.querySelectorAll("main section[id]")];
  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  document.body.classList.add("js-ready");

  if (header) {
    const setHeader = () => {
      header.classList.toggle("is-scrolled", window.scrollY > 8);
    };

    setHeader();
    window.addEventListener("scroll", setHeader, { passive: true });
  }

  const setMenuOpen = (open) => {
    if (!toggle || !mobileNav) return;
    toggle.classList.toggle("is-open", open);
    toggle.setAttribute("aria-expanded", String(open));
    toggle.setAttribute("aria-label", open ? "Close menu" : "Open menu");
    mobileNav.classList.toggle("is-open", open);
    document.body.classList.toggle("nav-open", open);
    document.body.style.overflow = open ? "hidden" : "";
  };

  const closeMenu = () => setMenuOpen(false);

  if (toggle && mobileNav) {
    toggle.addEventListener("click", () => {
      setMenuOpen(!toggle.classList.contains("is-open"));
    });

    mobileNav.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", closeMenu);
    });

    document.addEventListener("keydown", (event) => {
      if (event.key === "Escape") closeMenu();
    });
  }

  const navMap = {
    home: "home",
    about: "about",
    how: "how",
    features: "features",
    discover: "features",
    faq: "faq",
    privacy: "privacy",
    terms: "privacy"
  };

  const activateNav = () => {
    const fromTop = window.scrollY + 120;
    let current = sections[0]?.id;

    sections.forEach((section) => {
      if (section.offsetTop <= fromTop) current = section.id;
    });

    const active = navMap[current] || current;
    navLinks.forEach((link) => {
      link.classList.toggle("is-active", link.getAttribute("href") === `#${active}`);
    });
  };

  if (sections.length) {
    activateNav();
    window.addEventListener("scroll", activateNav, { passive: true });
  }

  document.querySelectorAll(".faq-btn").forEach((button) => {
    button.addEventListener("click", () => {
      const item = button.closest(".faq-item");
      const expanded = button.getAttribute("aria-expanded") === "true";

      document.querySelectorAll(".faq-item").forEach((other) => {
        other.classList.remove("is-open");
        other.querySelector(".faq-btn").setAttribute("aria-expanded", "false");
      });

      if (!expanded) {
        item.classList.add("is-open");
        button.setAttribute("aria-expanded", "true");
      }
    });
  });

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.12, rootMargin: "0px 0px -8% 0px" }
  );

  document.querySelectorAll(".reveal-on-scroll").forEach((el, index) => {
    if (!reduceMotion) {
      el.style.transitionDelay = `${Math.min(index % 4, 3) * 80}ms`;
    }
    observer.observe(el);
  });
})();
