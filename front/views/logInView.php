<?php
class LoginView
{


    public function showFormLogin()
    {
?>

    <div class="max-w-md mx-auto mt-20 p-6 bg-white dark:bg-gray-500 rounded-lg shadow-lg">
        <h2 class="text-2xl dark:text-gray-100 font-bold mb-6 text-center">Login</h2>
        <form method="post" action='http://localhost/gromer/front/index.php?controller=clientesUso&action=logIn'>
            <div class="mb-4">
                <label for="username" class="block mb-2 dark:text-gray-100">Username</label>
                <input type="text" id="username" name="email" required class="w-full p-3 rounded bg-gray-200 dark:bg-gray-400 border border-gray-300 dark:border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 dark:text-gray-100">Password</label>
                <input type="password" id="password" name="password" required class="w-full p-3 rounded bg-gray-200 dark:bg-gray-400 border border-gray-300 dark:border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <input type="submit" value="Login" class="w-full p-3 bg-blue-500 dark:bg-blue-600 rounded hover:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </form>
    </div>

<?php
    }
}