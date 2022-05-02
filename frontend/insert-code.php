<?php
require_once '../backend/config.php';
if(!isset($_SESSION['code'])){
  header('Location: forgot-password.php');
}
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot password - BinHub</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/tailwind.output.css" />
  <script src="assets/cdn.jsdelivr.net/gh/alpinejs/alpine%40v2.x.x/dist/alpine.min.js" defer></script>
  <script src="assets/js/init-alpine.js"></script>
</head>

<body>
  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
      <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
          <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="assets/img/logob.png"
            alt="Office" />
          <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="assets/img/logo.png"
            alt="Office" />
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
          <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
              Code verification
            </h1>
            <?php
            if (isset($_SESSION['alert'])) {
              echo $_SESSION['alert'];
              $_SESSION['alert'] = null;
            }
            ?>
            <form method="POST" action="../backend/userController/checkCode.php">
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Code</span>
                <input type="number" name="code"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  required>
              </label>
              <!-- You should use a button here, as the anchor is only used for the example  -->
              <input type="submit" value="Reset password"
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>