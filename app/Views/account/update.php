<?= $this->extend('layaout/index') ?>

<?= $this->section('content') ?>
<div class="bg-gray-100 font-sans antialiased">
    <?= $this->include('layaout/navigation') ?>
    <div class="flex items-center justify-center bg-gray-100">
        <div class="bg-white shadow-md rounded px-8 py-8 w-full">
            <h2 class="text-center text-2xl font-semibold mb-4">Edit User Information</h2>
            <form method="POST" action="<?= base_url('user/update') ?>" class="space-y-4">
                <div>
                    <label for="user_name" class="block text-gray-700 font-bold mb-2">Username</label>
                    <input id="user_name" name="user_name" type="text" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-indigo-500" value="<?= $user['username'] ?>">
                    <?php if (session('validation') && session('validation')->hasError('user_name')) : ?>
                        <p class="text-red-500 text-xs italic"><?= session('validation')->getError('user_name') ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="old_password" class="block text-gray-700 font-bold mb-2">Old Password</label>
                    <input id="old_password" name="old_password" type="password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-indigo-500">
                    <?php if (session('validation') && session('validation')->hasError('old_password')) : ?>
                        <p class="text-red-500 text-xs italic"><?= session('validation')->getError('old_password') ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                    <input id="password" name="password" type="password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-indigo-500">
                    <?php if (session('validation') && session('validation')->hasError('password')) : ?>
                        <p class="text-red-500 text-xs italic"><?= session('validation')->getError('password') ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="confirm_password" class="block text-gray-700 font-bold mb-2">Confirm Password</label>
                    <input id="confirm_password" name="confirm_password" type="password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-indigo-500">
                    <?php if (session('validation') && session('validation')->hasError('confirm_password')) : ?>
                        <p class="text-red-500 text-xs italic"><?= session('validation')->getError('confirm_password') ?></p>
                    <?php endif; ?>
                </div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update
                </button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>