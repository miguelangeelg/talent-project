<?= $this->extend('layaout/index') ?>

<?= $this->section('content') ?>
<div class="flex items-center justify-center h-screen">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/3">
        <h2 class="text-center text-lg font-semibold mb-4">Login</h2>
        <form method="POST" action="<?= base_url('loginAction') ?>">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input name="user_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username" value="<?= old('user_name') ?>">
                <?php if (session('validation') && session('validation')->hasError('user_name')) : ?>
                    <p class="text-red-500 text-xs italic"><?= session('validation')->getError('user_name') ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label name="password" class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
                <?php if (session('validation') && session('validation')->hasError('password')) : ?>
                    <p class="text-red-500 text-xs italic"><?= session('validation')->getError('password') ?></p>
                <?php endif; ?>
            </div>
            <?php if (session('validation') && session('validation')->hasError('general')) : ?>
                <div class="mb-4">
                    <p class="text-red-500 text-xs italic"><?= session('validation')->getError('general') ?></p>
                </div>
            <?php endif; ?>
            <div class="mb-4">
                <a href="/register" class="inline-block text-indigo-800 font-bold py-2 px-4 rounded">
                    Create Account
                </a>
            </div>
            <div class="flex items-center justify-center">
                <button class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Sign In
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection('content') ?>