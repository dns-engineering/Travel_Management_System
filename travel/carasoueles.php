<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Itinerary Form</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

h2 {
    text-align: center;
    margin-top: 20px;
}

form {
    width: 80%;
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

label {
    font-weight: bold;
}

input[type="text"],
select,
textarea {
    width: calc(100% - 24px); /* Adjusted for padding and border */
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

textarea {
    resize: vertical;
}

.custom-file-input {
    display: none;
}

.custom-file-label {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    display: inline-block;
    width: calc(100% - 24px); /* Adjusted for padding and border */
    box-sizing: border-box;
}

.custom-file-label:hover {
    background-color: #45a049;
}

.slider-container {
    width: 100%;
    overflow-x: auto;
    white-space: nowrap;
    margin-bottom: 20px;
}

.slider {
    display: inline-block;
    width: 100px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
    border-radius: 4px;
    margin-right: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.slider:hover {
    background-color: #45a049;
}

button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

hr {
    border: 0;
    border-top: 1px solid #ccc;
    margin-top: 20px;
    margin-bottom: 20px;
}

h3 {
    margin-top: 0;
}

    </style>
</head>
<body>
    <h2>Tour Itinerary Form</h2>
    <form action="carasouel.php" method="POST" enctype="multipart/form-data">
        <label for="tourname">Tour Name:</label>
        <select id="tourname" name="tourname">
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <!-- Add more options as needed -->
        </select>
        <hr>
        <!-- Slider -->
        <div class="slider-container">
            <!-- Sliders for each day -->
            <?php for ($day = 1; $day <= 8; $day++) : ?>
                <div class="slider" id="slider<?php echo $day; ?>">Day <?php echo $day; ?></div>
            <?php endfor; ?>
        </div>
        <!-- Day Sections -->
        <?php for ($day = 1; $day <= 8; $day++) : ?>
            <div class="day-content" id="day<?php echo $day; ?>" <?php echo ($day === 1) ? 'style="display: block;"' : ''; ?>>
                <h3>Day <?php echo $day; ?></h3>
                <label for="hotel_name<?php echo $day; ?>">Hotel Name:</label>
                <input type="text" id="hotel_name<?php echo $day; ?>" name="h<?php echo $day; ?>">
                <label for="image_upload<?php echo $day; ?>" class="custom-file-label">Upload Image</label>
                <input type="file" id="image_upload<?php echo $day; ?>" class="custom-file-input" accept="image/*" name="h<?php echo $day; ?>img"><br>
                <label for="description<?php echo $day; ?>">Description:</label><br>
                <textarea id="description<?php echo $day; ?>" name="h<?php echo $day; ?>des" rows="4" cols="50"></textarea>
                <hr>
            </div>
        <?php endfor; ?>
        <button type="submit">Submit</button>
    </form>
    <!-- JavaScript for slider functionality -->
    <script>
        const sliders = document.querySelectorAll('.slider');
        const days = document.querySelectorAll('.day-content');

        sliders.forEach((slider, index) => {
            slider.addEventListener('click', () => {
                // Hide all day contents
                days.forEach(day => {
                    day.style.display = 'none';
                });
                // Show the corresponding day content
                days[index].style.display = 'block';
            });
        });
    </script>
</body>
</html>
