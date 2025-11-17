<?php
if(isset($_POST['question'])) {
    $question = $_POST['question'];
    
    $file_path = "synthetic_room_data.csv";  // path to your file
    if(file_exists($file_path)) {
        $file_contents = file_get_contents($file_path);
    } else {
        $file_contents = "";
    }

    // Escape the input for shell safety
    $escaped_question = escapeshellarg($question);

    //$escaped_prompt = escapeshellarg($file_contents . "\nUser question: " . $question);

    // Call Ollama CLI
    // Replace "ollama run campus-model" with your local model name
//    $command = "ollama run llama3.1 --prompt $escaped_prompt";
    $command = "echo " . $escaped_question . " | cat synthetic_room_data.csv - | /usr/local/bin/ollama run llama3.1";
    
    // Execute command and capture output
    $response = shell_exec($command);

    // Send response back to webpage
    echo $response;
    //echo $command;
}
?>
