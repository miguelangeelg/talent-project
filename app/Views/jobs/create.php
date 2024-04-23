<?= $this->extend('layaout/index') ?>

<?= $this->section('content') ?>
<div class="bg-gray-100 font-sans antialiased">
    <?= $this->include('layaout/navigation') ?>

    <div class="min-h-screen flex items-center justify-center bg-indigo-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Create a new job
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="<?= base_url('jobs/store') ?>" method="POST">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="job_title" class="sr-only">Job Title</label>
                        <input id="job_title" name="job_title" type="text" autocomplete="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Job Title">
                        <?php if (session('validation') && session('validation')->hasError('job_title')) : ?>
                            <p class="mt-2 text-sm text-red-600"><?= session('validation')->getError('job_title') ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label for="job_description" class="sr-only">Job Description</label>
                        <textarea id="job_description" name="job_description" autocomplete="description" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Job Description"></textarea>
                        <?php if (session('validation') && session('validation')->hasError('job_description')) : ?>
                            <p class="mt-2 text-sm text-red-600"><?= session('validation')->getError('job_description') ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Create Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>