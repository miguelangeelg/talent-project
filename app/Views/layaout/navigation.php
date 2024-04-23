<nav class="bg-indigo-600">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0">
                    <a href="/" class="text-white font-bold text-lg">Talent</a>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="/" class="text-white hover:bg-indigo-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="/user/information" class="text-white hover:bg-indigo-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Account</a>
                        <?php if ($role == 'Recruiter') : ?>
                            <a href="/job-create" class="text-white hover:bg-indigo-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Post a job</a>
                        <?php endif; ?>
                        <form method="POST" action="<?= base_url('logout') ?>">
                            <button type="submit" class="text-white hover:bg-indigo-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Log out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
