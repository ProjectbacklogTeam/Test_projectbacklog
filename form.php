<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Contact</h1>
    
    <form method="post" action="send-email.php">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
        
        <label for="email">email</label>
        <input type="email" name="email" id="email" required>

        <label for="tag1">Tag 1 email:</label>
        <input type="email" name="tag1" id="tag1">
<!--         
        <label for="tag2">Tag 2 email:</label>
        <input type="email" name="tag2" id="tag2">
        
        <label for="tag3">Tag 3 email:</label>
        <input type="email" name="tag3" id="tag3"> -->
        
        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" required>
        
        <label for="message">Message</label>
        <textarea name="message" id="message" required></textarea>

        <label for="attachFile">AttachFile</label>
        <input type="file" name="attachment" id="attachment" required>
        
        <br>
        
        <button>Send</button>
    </form>
    
</body>
</html>