<div class="request-wrapper">
    <p class="name">Name: <?= $this->data['request']->getName() ?></p>
    <p class="surname">Surname: <?= $this->data['request']->getSurname() ?></p>
    <p class="category">Category: <?= $this->data['request']->getCategory() ?></p>
    <p class="email">Email: <?= $this->data['request']->getEmail() ?></p>
    <?php if ($this->data['request']->getPhone() != null) : ?>
        <p class="phone">Phone: <?= $this->data['request']->getPhone() ?></p>
    <?php endif; ?>
    <p class="subject">Subject: <?= $this->data['request']->getSubject() ?></p>
    <p class="message">Message: <?= $this->data['request']->getMessage() ?></p>
</div>
<div class="answers">
    <?php if (!empty($this->data['answers'])) : ?>
        <?php foreach ($this->data['answers'] as $answer) : ?>
            <hr>
            <div class="answer">
                <p><?= $answer->getName() ?></p>
                <p><?= $answer->getSurname() ?></p>
                <p><?= $answer->getMessage() ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<hr>
<form action="<?= $this->link('request/answer') ?>" method="POST">
    <input type="hidden" name="requestId" value="<?= $this->data['request']->getId() ?>">
    <label for="name">Name</label>
    <input type="text" id="name" name="name">
    <label for="surname">Surname</label>
    <input type="text" id="surname" name="surname">
    <label for="message">Message</label>
    <input type="text" id="message" name="message">
    <button type="submit">Answer</button>
</form>