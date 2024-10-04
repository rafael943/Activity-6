<?php include 'header.php';?>
        <?php
        $slides = [
            ['name' => 'Aaron Angelo Aquino', 'desc' => 'Hello, I\'m Aaron, 21 years old, a group member who is a Full-Stack Developer in this webpage.', 'image' => 'aaron.jpg'],
            ['name' => 'Aljon Nuestro', 'desc' => 'A group member who is responsive with every language. <br> -Full-Stack', 'image' => 'aljon.jpg'],
            ['name' => 'Ira Christine Catapia', 'desc' => 'Hello, I\'m Ira, a  group member who is a Full-Stack Developer:> ', 'image' => 'IRA.JPG'],
            ['name' => 'Jacob Alocon', 'desc' => 'An IT Student who is responsive with every language. <br> -Full-Stack', 'image' => 'jacob.jpg'],
            ['name' => 'Rafael Cena', 'desc' => 'An IT Student who is responsible with every languange', 'image' => 'rafael.jpg']
        ];

        foreach ($slides as $index => $slide) {
            $activeClass = ($index === 0) ? 'showing' : '';
            echo "<li class='slide $activeClass' style='background-image: url({$slide['image']});'>
                    <p class='names'>{$slide['name']}</p><br>
                    <p class='desc'>{$slide['desc']}</p>
                </li>";
        }
        ?>
    </ul>
    <section class="team">
        <div class="center">
        <div class="header-container">
            <div class="searchbar">
                <input type="text" name="query" id="query" onkeyup="showResult(this.value)" placeholder="Name Search">
                <input type="submit" value="Search" onclick="searchTeam()">
            </div>
        </div>
            <h1>Group 3</h1>
        </div>
        <div class="team-content">
            <?php
            $teamMembers = [
                ['image' => 'aaron.jpg', 'name' => 'Aaron Angelo Aquino', 'link' => 'aaron/aaron.html'],
                ['image' => 'aljon.jpg', 'name' => 'Aljon Nuestro', 'link' => 'aljon/aljon.html'],
                ['image' => 'jacob.jpg', 'name' => 'Jacob Alocon', 'link' => 'jacob/jacob.html'],
                ['image' => 'IRA.JPG', 'name' => 'Ira Christine Catapia', 'link' => 'ira/ira.html'],
                ['image' => 'rafael.jpg', 'name' => 'Rafael Cena', 'link' => 'rafael/rafael.html']
            ];
            foreach ($teamMembers as $member) {
                echo "<div class='box'>
                        <img src='{$member['image']}' alt='{$member['name']}'>
                        <h3><a href='{$member['link']}'>{$member['name']}</a></h3>
                    </div>";
            }
            ?>
    <button class="contact-button" onclick="toggleContactForm()">Contact Us</button>
            <div class="contact-form" id="contactForm">
            <form method="POST" action="">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                <br>
                <button type="submit">Send</button>
            </form>
            
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);

                $messageContent = "Name: $name\nEmail: $email\nMessage: $message\n\n";
                file_put_contents('messages.txt', $messageContent, FILE_APPEND);

                echo "<p>Thank you, $name! We have received your message.</p>";
            }
            ?>
        </div>
        </section>
        <?php include 'footer.php';?>