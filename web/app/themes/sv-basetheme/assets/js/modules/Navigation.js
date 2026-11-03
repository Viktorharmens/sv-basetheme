const DESKTOP_QUERY = '(min-width: 64rem)';

export class Navigation {
  /** @type {HTMLElement} */
  #element;

  /** @type {HTMLButtonElement} */
  #toggle;

  /** @type {HTMLElement} */
  #menu;

  /** @type {MediaQueryList} */
  #desktop;

  #onClick = () => this.#handleClick();
  #onKeydown = (event) => this.#handleKeydown(event);
  #onBreakpoint = (event) => this.#handleBreakpoint(event);

  /**
   * @param {string} [selector='.js-navigation'] - CSS selector voor het root element
   */
  constructor(selector = '.js-navigation') {
    this.#element = document.querySelector(selector);

    if (!this.#element) return;

    this.#toggle = this.#element.querySelector('.js-navigation-toggle');
    this.#menu = this.#element.querySelector('.js-navigation-menu');
    this.#desktop = window.matchMedia(DESKTOP_QUERY);

    if (!this.#toggle || !this.#menu) return;

    this.#init();
  }

  // ─── Private methoden ────────────────────────────────────────────

  #init() {
    this.#bindEvents();
  }

  #bindEvents() {
    this.#toggle.addEventListener('click', this.#onClick);
    document.addEventListener('keydown', this.#onKeydown);
    this.#desktop.addEventListener('change', this.#onBreakpoint);
  }

  #setOpen(isOpen) {
    this.#toggle.setAttribute('aria-expanded', String(isOpen));
    this.#menu.toggleAttribute('data-open', isOpen);
  }

  get #isOpen() {
    return this.#toggle.getAttribute('aria-expanded') === 'true';
  }

  // ─── Event handlers ──────────────────────────────────────────────

  #handleClick() {
    this.#setOpen(!this.#isOpen);
  }

  #handleKeydown(event) {
    if (event.key !== 'Escape' || !this.#isOpen) return;

    this.#setOpen(false);
    this.#toggle.focus();
  }

  #handleBreakpoint(event) {
    if (event.matches) this.#setOpen(false);
  }

  // ─── Public API ──────────────────────────────────────────────────

  destroy() {
    this.#toggle?.removeEventListener('click', this.#onClick);
    document.removeEventListener('keydown', this.#onKeydown);
    this.#desktop?.removeEventListener('change', this.#onBreakpoint);
  }
}
