</main>
<footer class="bg-surface-container-lowest py-12 border-t border-subtle">
  <div class="max-w-container-max mx-auto px-gutter grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-stack-lg">
    <div class="space-y-stack-md">
      <div class="flex items-center gap-2">
        <svg width="32" height="32" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <rect width="24" height="24" rx="6" fill="#ff0a1f"></rect>
          <path d="M9 7l9 5-9 5V7z" fill="white"></path>
        </svg>
        <span class="font-display-lg text-headline-lg font-black text-primary">Pokiflix</span>
      </div>
      <p class="text-on-surface-variant max-w-xs">
        The ultimate cinematic companion for modern entertainment lovers. Stream smarter, watch faster.
      </p>
      <div class="flex gap-4">
        <a class="material-symbols-outlined text-on-surface-variant hover:text-brand-red transition-colors" href="#" aria-label="Website">public</a>
        <a class="material-symbols-outlined text-on-surface-variant hover:text-brand-red transition-colors" href="#" aria-label="Podcasts">podcasts</a>
        <a class="material-symbols-outlined text-on-surface-variant hover:text-brand-red transition-colors" href="#" aria-label="RSS">rss_feed</a>
      </div>
    </div>
    <div>
      <h4 class="font-label-md text-on-surface mb-stack-md uppercase tracking-wider">Navigation</h4>
      <ul class="space-y-2 text-on-surface-variant font-body-md">
        <li><a class="hover:text-primary transition-colors" href="index.php">Home</a></li>
        <li><a class="hover:text-primary transition-colors" href="movies.php">Movies</a></li>
        <li><a class="hover:text-primary transition-colors" href="series.php">Series</a></li>
        <li><a class="hover:text-primary transition-colors" href="index.php#trending">Trending</a></li>
      </ul>
    </div>
    <div>
      <h4 class="font-label-md text-on-surface mb-stack-md uppercase tracking-wider">Company</h4>
      <ul class="space-y-2 text-on-surface-variant font-body-md">
        <li><a class="hover:text-primary transition-colors" href="about.php">About Us</a></li>
        <li><a class="hover:text-primary transition-colors" href="terms.php">Terms of Service</a></li>
        <li><a class="hover:text-primary transition-colors" href="privacy.php">Privacy Policy</a></li>
        <li><a class="hover:text-primary transition-colors" href="faq.php">FAQ</a></li>
      </ul>
    </div>
    <div>
      <h4 class="font-label-md text-on-surface mb-stack-md uppercase tracking-wider">Contact Us</h4>
      <ul class="space-y-2 text-on-surface-variant font-body-md">
        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">mail</span> prishafashion2301@gmail.com</li>
        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">help</span> <a class="hover:text-primary transition-colors" href="faq.php">Help Center</a></li>
        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">chat</span> <a class="hover:text-primary transition-colors" href="contact.php">Contact Form</a></li>
      </ul>
    </div>
  </div>
  <div class="max-w-container-max mx-auto px-gutter mt-12 pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center text-on-surface-variant text-label-sm">
    <span>&copy; <?= date('Y') ?> Pokiflix. All rights reserved.</span>
    <span class="mt-4 md:mt-0">Made with &hearts; by <a class="text-primary hover:underline" href="#">VidAPI</a></span>
  </div>
</footer>
<script src="assets/js/main.js"></script>
</body>
</html>
