<div class="form">
    <h1>Post new request</h1>
    <form action="<?= $this->link('request/create') ?>" method="POST">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required><br>
        <label for="surname">Surname</label>
        <input type="text" id="surname" name="surname" required><br>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" required><br>
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone"><br>
        <label for="categoryId">Select a category: </label>
        <select name="categoryId" id="categoryId">
            <?php
                foreach ($this->data['categories'] as $category) {
                    echo '<option value="' . $category->getId() . '">' . $category->getName() . '</option>';
                }
            ?>
        </select><br>
        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" required><br>
        <label for="message">Message</label>
        <textarea id="message" name="message"></textarea>
        <button type="submit">Post</button>
</div>