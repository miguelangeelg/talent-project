<?= $this->extend('layaout/index') ?>

<?= $this->section('content') ?>
<div class="bg-gray-100 font-sans antialiased">
    <?= $this->include('layaout/navigation') ?>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="px-4">
                <h1 class="font-bold text-gray-900 mb-8" style="font-size: 94px;">Welcome <?= $userData['user_name'] ?>!</h1>
            </div>
            <?php if ($role == 'Recruiter') : ?>
                <h1 class="font-bold text-indigo-700 mb-8">Your jobs posted</h1>
            <?php endif; ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($jobs as $job) : ?>
                    <div class="bg-white overflow-hidden shadow-md rounded-lg py-5">
                        <div class="px-4 py-5 sm:p-6">
                            <p class="text-lg font-semibold text-indigo-600"><?= esc($job['job_title']) ?></p>
                            <p class="mt-2 text-sm text-gray-600"><?= esc($job['description']) ?></p>
                            <p class="mt-2 text-sm text-gray-600">created <?= esc($job['created_at']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>