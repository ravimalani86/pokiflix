<?php
require __DIR__ . '/partials/functions.php';
$pageTitle = 'Contact | Pokiflix';
$pageDescription = 'Get in touch with the Pokiflix team.';
$activeNav = '';
require __DIR__ . '/partials/header.php';
?>
<section class="pt-32 pb-16 bg-surface-container-lowest border-b border-subtle">
  <div class="max-w-container-max mx-auto px-gutter text-center">
    <h1 class="font-display-lg text-headline-xl md:text-display-lg mb-stack-md">Contact Us</h1>
    <p class="text-on-surface-variant max-w-2xl mx-auto">Questions, feedback, or partnership inquiries - we'd love to hear from you.</p>
  </div>
</section>

<section class="py-24 bg-surface">
  <div class="max-w-container-max mx-auto px-gutter grid grid-cols-1 lg:grid-cols-3 gap-stack-lg">
    <div class="space-y-stack-md">
      <div class="glass-panel p-6 rounded-xl flex items-start gap-4">
        <span class="material-symbols-outlined text-brand-red text-3xl">mail</span>
        <div>
          <h3 class="font-headline-lg text-headline-lg mb-1">Email</h3>
          <a href="mailto:prishafashion2301@gmail.com" class="text-on-surface-variant hover:text-primary transition-colors">prishafashion2301@gmail.com</a>
        </div>
      </div>
      <div class="glass-panel p-6 rounded-xl flex items-start gap-4">
        <span class="material-symbols-outlined text-brand-red text-3xl">help</span>
        <div>
          <h3 class="font-headline-lg text-headline-lg mb-1">Help Center</h3>
          <a href="faq.php" class="text-on-surface-variant hover:text-primary transition-colors">Visit our FAQ</a>
        </div>
      </div>
      <div class="glass-panel p-6 rounded-xl flex items-start gap-4">
        <span class="material-symbols-outlined text-brand-red text-3xl">chat</span>
        <div>
          <h3 class="font-headline-lg text-headline-lg mb-1">Community</h3>
          <p class="text-on-surface-variant">Join our Discord community for updates and support.</p>
        </div>
      </div>
    </div>

    <form id="contact-form" class="lg:col-span-2 glass-panel p-8 rounded-xl space-y-stack-md">
      <div id="contact-form-status" class="hidden bg-brand-red/10 border border-brand-red text-primary rounded-lg px-4 py-3 text-sm"></div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-stack-md">
        <div>
          <label class="block text-label-sm text-on-surface-variant mb-2" for="name">Name</label>
          <input required class="w-full bg-surface-container-high border border-subtle rounded-lg px-4 py-3 outline-none text-on-surface focus:border-brand-red transition-colors" id="name" name="name" type="text"/>
        </div>
        <div>
          <label class="block text-label-sm text-on-surface-variant mb-2" for="email">Email</label>
          <input required class="w-full bg-surface-container-high border border-subtle rounded-lg px-4 py-3 outline-none text-on-surface focus:border-brand-red transition-colors" id="email" name="email" type="email"/>
        </div>
      </div>
      <div>
        <label class="block text-label-sm text-on-surface-variant mb-2" for="subject">Subject</label>
        <input required class="w-full bg-surface-container-high border border-subtle rounded-lg px-4 py-3 outline-none text-on-surface focus:border-brand-red transition-colors" id="subject" name="subject" type="text"/>
      </div>
      <div>
        <label class="block text-label-sm text-on-surface-variant mb-2" for="message">Message</label>
        <textarea required class="w-full bg-surface-container-high border border-subtle rounded-lg px-4 py-3 outline-none text-on-surface focus:border-brand-red transition-colors" id="message" name="message" rows="5"></textarea>
      </div>
      <button type="submit" class="bg-brand-red text-white px-8 py-4 rounded-lg font-label-md text-label-md hover:opacity-90 transition-all">Send Message</button>
    </form>
  </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
