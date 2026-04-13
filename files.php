<?php

    echo "<h1>File Read/Write</h1>";

    $filename="new_file.txt";

    $file=fopen($filename,"w");
    fwrite($file,"This is a new file created using PHP.");
    fclose($file);

    $file=fopen($filename,"r");
    echo fread($file,filesize("new file.txt"));
    fclose($file);

    //$filename="new_file.txt";

    echo "<br>";
    echo "Exists:".file_exists($filename)."<br>";
    echo "Size:".filesize($filename)."<br>";
    echo "Type:".filetype($filename)."<br>";
    echo "Last Modified:".filemtime($filename)."<br>";
    echo "File get contents:".file_get_contents($filename)."<br>";
    echo "File put contents:".file_put_contents($filename,"This is updated content.")."<br>";
    echo "File Function";
    if (file_exists($filename)) {
        $lines = file($filename);
        foreach ($lines as $line) {
            echo $line . "<br>";
        }
    } else {
        echo "File not found.";
    }

    echo "<h2>File Information</h2>";
    if(file_exists("new_file.txt")){
        echo "File exists.<br>";
        echo "File size: " . filesize($filename)." bytes<br>";
        echo "File type: " . filetype($filename)."<br>";
        echo "Last accessed: " . date("Y-m-d H:i:s",fileatime($filename))."<br>";
        echo "Last modified: " . date("Y-m-d H:i:s", filemtime($filename))."<br>";
        echo "Created time: " . date("Y-m-d H:i:s", filectime($filename))."<br>";
        echo "Permissions: " . fileperms($filename)."<br>";
        echo "Owner ID: " . fileowner($filename)."<br>";
        echo "Group ID: " . filegroup($filename)."<br>";
        echo "Inode: " . fileinode($filename)."<br>";

    }
    echo "<h3> File & Folder Management</h3>";
        if(!is_dir("uploads")){
            mkdir("uploads",0777,true);
            echo "Directory 'uploads' created.<br>";
        }
        else{
            echo "Directory 'uploads' already exists.<br>";
        }

        copy("new_file.txt","uploads/new_file_copy.txt");
        echo "File Copied.<br>";

        rename("uploads/new_file_copy.txt","uploads/renamed_file.txt");
        echo "File Renamed.<br>";
        
        if (is_file($filename)) {
            echo "$filename is a file.<br>";
        }
        if (is_dir("uploads")) {
            echo "uploads is a directory.<br>";
        }

        unlink("new_file.txt");
        echo "File Deleted.<br>";

        rmdir("uploads");
        echo "Directory Deleted.<br>";

    echo "<h3>4 Directory Handling</h3>";

    echo "Current Working Directory: " . getcwd() . "<br>";

    mkdir("demo");
    chdir("demo");
    echo "Changed Directory to: " . getcwd() . "<br>";

    chdir("..");

    echo "<br><b>Using scandir():</b><br>";
    $files = scandir(".");
    foreach ($files as $f) {
        echo $f . "<br>";
    }

    echo "<br><b>Using opendir() and readdir():</b><br>";
    $dir = opendir(".");
    while (($file = readdir($dir)) !== false) {
        echo $file . "<br>";
    }
    closedir($dir);

    rmdir("demo");

    echo "<hr>";
    echo "<h3>5 File Locking (flock)</h3>";

    $file = fopen($filename, "a");

    if (flock($file, LOCK_EX)) {
        fwrite($file, "\nLocked writing example.");
        flock($file, LOCK_UN);
        echo "File locked and written successfully.<br>";
    } else {
        echo "Could not lock file.<br>";
    }

    fclose($file);

    echo "<hr>";
    //Task 3
    echo "<h2>Task 3: File Modes</h2>";
    
    $file = fopen($filename, "w");
    fwrite($file, "We have done lot of tasks");
    fclose($file);

    echo "<hr>1. r (Read Only)<br>";
    $file = fopen($filename, "r");
    echo fread($file, filesize($filename));
    fclose($file);


    echo "<hr>2. w (Write Only - erase old data)<br>";
    $file = fopen($filename, "w");
    fwrite($file, "Written using w mode\n");
    fclose($file);
    echo "Data written.<br>";


    echo "<hr>3. a (Append)<br>";
    $file = fopen($filename, "a");
    fwrite($file, "Appended using a mode\n");
    fclose($file);
    echo "Data appended.<br>";


    echo "<hr>4. x (Create new file)<br>";
    $newfile = "newfile.txt";
    $file = fopen($newfile, "x");
    if ($file) {
        fwrite($file, "Created using x mode\n");
        fclose($file);
        echo "New file created.<br>";
    } else {
        echo "File already exists.<br>";
    }


    echo "<hr>5. r+ (Read & Write)<br>";
    $file = fopen($filename, "r+");
    fwrite($file, "R+ mode text\n");
    rewind($file);
    echo fread($file, filesize($filename));
    fclose($file);


    echo "<hr>6. w+ (Read & Write erase old)<br>";
    $file = fopen($filename, "w+");
    fwrite($file, "W+ mode text\n");
    rewind($file);
    echo fread($file, filesize($filename));
    fclose($file);


    echo "<hr>7. a+ (Read & Append)<br>";
    $file = fopen($filename, "a+");
    fwrite($file, "A+ mode text\n");
    rewind($file);
    echo fread($file, filesize($filename));
    fclose($file);


    echo "<hr>8. x+ (Create new Read & Write)<br>";
    $newfile2 = "newfile2.txt";
    $file = fopen($newfile2, "x+");
    if ($file) {
        fwrite($file, "X+ mode text\n");
        rewind($file);
        echo fread($file, filesize($newfile2));
        fclose($file);
        echo "<br>File created successfully.<br>";
    } else {
        echo "File already exists.<br>";
    }

    echo "<hr>All modes executed.";


?>
