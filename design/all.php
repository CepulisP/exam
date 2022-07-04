<form action="<?php $this->link('request/all') ?>" method="GET">
    <label for="categoryId">Filter by category: </label>
    <select name="categoryId" id="categoryId">
        <option value="">All</option>
        <?php
        foreach ($this->data['categories'] as $category) {
            echo '<option value="' . $category->getId() . '">' . $category->getName() . '</option>';
        }
        ?>
    </select>
    <button type="submit">Filter</button>
</form>
<div class="all-reqs">
    <table>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Category</th>
            <th>Subject</th>
            <th>Seen</th>
            <th>Answered</th>
            <th>Delete</th>
            <th>View</th>
        </tr>
        <?php foreach($this->data['requests'] as $request) : ?>
            <tr>
                <td><?= $request->getName() ?></td>
                <td><?= $request->getSurname() ?></td>
                <td><?= $request->getCategory() ?></td>
                <td><?= $request->getSubject() ?></td>
                <td>
                    <?php
                        if ($request->isSeen()) {
                            echo 'Yes';
                        } else {
                            echo 'No';
                        }
                    ?>
                </td>
                <td>
                    <?php
                    if ($request->isAnswered()) {
                        echo 'Yes';
                    } else {
                        echo 'No';
                    }
                    ?>
                </td>
                <td><a href="<?= $this->link('request/delete/') . $request->getId() ?>">Delete</td>
                <td><a href="<?= $this->link('request/show/') . $request->getId() ?>">View</td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>