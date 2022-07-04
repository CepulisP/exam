<html>
<head>
    <title><?= $this->data['title']; ?></title>
    <meta name="description" content="<?= $this->data['meta_description']; ?>">
    <link rel="stylesheet" href="<?= BASE_URL_WITHOUT_INDEX_PHP . 'css/style.css'; ?>">
</head>
<body>
<header class="main-header">
    <div class="header">
        <ul class="links">
            <li><a href='<?= $this->link('request/add') ?>'>New Request</a></li>
            <li><a href='<?= $this->link('request/all') ?>'>All Requests</a></li>
        </ul>
    </div>
</header>
<div class="page-content">