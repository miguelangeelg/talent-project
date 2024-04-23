<?= $this->extend('layaout/index') ?>

<?= $this->section('content') ?>
<div class="flex items-center justify-center h-screen">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/3">
        <h2 class="text-center text-lg font-semibold mb-4">Sign Up</h2>
        <form method="POST" action="<?= base_url('register/store') ?>">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input name="user_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username" value="<?= old('user_name') ?>">
                <?php if (session('validation') && session('validation')->hasError('user_name')): ?>
                    <p class="text-red-500 text-xs italic"><?= session('validation')->getError('user_name') ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="role">
                    Role
                </label>
                <div class="relative">
                    <select name="role" class="block appearance-none w-full bg-white border border-gray-400 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-gray-500" id="role">
                        <?php foreach ($roles as $rol) : ?>
                            <option value="<?= $rol['id'] ?>" <?= old('role') == $rol['id'] ? 'selected' : '' ?>><?= $rol['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (session('validation') && session('validation')->hasError('role')): ?>
                        <p class="text-red-500 text-xs italic"><?= session('validation')->getError('role') ?></p>
                    <?php endif; ?>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M10 12L4 6h12z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label name="password" class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
                <?php if (session('validation') && session('validation')->hasError('password')): ?>
                    <p class="text-red-500 text-xs italic"><?= session('validation')->getError('password') ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-6">
                <label name="confirm_password" class="block text-gray-700 text-sm font-bold mb-2" for="confirm-password">
                    Confirm Password
                </label>
                <input name="confirm_password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="confirm-password" type="password" placeholder="******************">
                <?php if (session('validation') && session('validation')->hasError('confirm_password')): ?>
                    <p class="text-red-500 text-xs italic"><?= session('validation')->getError('confirm_password') ?></p>
                <?php endif; ?>
            </div>
            <div class="flex items-center justify-center">
                <button class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Sign Up
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection('content') ?>