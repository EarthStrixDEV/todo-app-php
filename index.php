<?php
require_once "config.php";

$sql = "SELECT * FROM todo_list";
$result = $pdo->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Todo App Main</title>
</head>

<body>
    <div class="w-full h-screen bg-slate-900 flex items-center justify-center h-screen" id="main_container">
        <div class="w-screen z-0">
            <img src="./images/bg-desktop-dark.jpg" width="100%" alt="background_image" class="absolute top-0" />
        </div>
        <div class="absolute inset-y-0 container w-6/12 mx-auto h-full z-10 py-10 px-24">
            <div class="flex flex-row justify-between items-center p-6">
                <h1 class="text-left text-4xl font-medium text-white tracking-normal">T O D O</h1>
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" class="theme_switch cursor-pointer">
                    <path fill="#FFF" fill-rule="evenodd" d="M13 0c.81 0 1.603.074 2.373.216C10.593 1.199 7 5.43 7 10.5 7 16.299 11.701 21 17.5 21c2.996 0 5.7-1.255 7.613-3.268C23.22 22.572 18.51 26 13 26 5.82 26 0 20.18 0 13S5.82 0 13 0z" />
                </svg>
            </div>
            <form class="flex flex-row items-center px-6 py-3 rounded-md bg-slate-800 my-3" action="form.php" method="post" id="form_input_insert_data">
                <input type="checkbox" name="" id="" class=" w-6 h-6 rounded-full" />
                <input type="text" name="todo_track_input" id="" class="bg-inherit text-white p-3 mx-3 w-full border-0 focus:outline-0" placeholder="Create a new todo...">
                <button type="submit" name="submit" class="text-base text-gray-700 font-bold hover:text-violet-500">Add</button>
            </form>
            <div class="rounded-lg overflow-hidden shadow-xl">
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="flex flex-row items-center p-6 bg-slate-800 border-b-2 border-gray-600 data_todo_list">
                        <input type="checkbox" name="" id="" class="mr-3 w-6 h-6 rounded-full" />
                        <p class="text-gray-300 tracking-wide whitespace-pre-wrap font-bold px-4 flex-1"><?php echo $row['todo_track']; ?></p>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="text-base text-gray-700 font-bold hover:text-violet-500" onclick="return confirm('Are you sure to delete this track?');">Delete</a>
                    </div>
                <?php } ?>
                <div class="flex flex-row flex flex-row items-center justify-between p-6 bg-slate-800 menu_footer">
                    <small class="text-base text-gray-700 font-bold count_list">5 items left</small>
                    <div class="flex flex-row justify-center w-10">
                        <button class="mx-2 text-base text-gray-700 font-bold hover:text-violet-500">All</button>
                        <button class="mx-2 text-base text-gray-700 font-bold hover:text-violet-500">Active</button>
                        <button class="mx-2 text-base text-gray-700 font-bold hover:text-violet-500">Complete</button>
                    </div>
                    <button class="text-base text-gray-700 font-bold">Clear Complete</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    echo '<script type="text/javascript" src="script.js"></script>'; 
    ?>
    
</body>

</html>