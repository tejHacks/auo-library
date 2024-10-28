<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<nav class="navbar navbar-expand-lg text-light" style="background-color: green; padding: 1.5rem;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../assets/school.png" alt="Logo" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="dashboard.php">
                        <i class="fa fa-tachometer-alt" style="color: white;"></i> AUO LIBRARY
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-th-list" style="color: white;"></i> Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        <li><a class="dropdown-item text-light" href="add-category.php"><i class="fa fa-plus" style="color: white;"></i> Add Category</a></li>
                        <li><a class="dropdown-item text-light" href="manage-categories.php"><i class="fa fa-cogs" style="color: white;"></i> Manage Categories</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown text-light">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="authorsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user-edit" style="color: white;"></i> Authors
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="authorsDropdown">
                        <li><a class="dropdown-item text-light" href="add-author.php"><i class="fa fa-plus" style="color: white;"></i> Add Author</a></li>
                        <li><a class="dropdown-item text-light" href="manage-authors.php"><i class="fa fa-cogs" style="color: white;"></i> Manage Authors</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="booksDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-book" style="color: white;"></i> Books
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="booksDropdown">
                        <li><a class="dropdown-item text-light" href="add-book.php"><i class="fa fa-plus" style="color: white;"></i> Add Book</a></li>
                        <li><a class="dropdown-item text-light" href="manage-books.php"><i class="fa fa-cogs" style="color: white;"></i> Manage Books</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="issueBooksDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-share-square" style="color: white;"></i> Issued Books
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="issueBooksDropdown">
                        <li><a class="dropdown-item text-light" href="issue-book.php"><i class="fa fa-plus" style="color: white;"></i> Issue New Book</a></li>
                        <li><a class="dropdown-item text-light" href="manage-issued-books.php"><i class="fa fa-cogs" style="color: white;"></i> Manage Issued Books</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="reg-students.php"><i class="fa fa-user-plus" style="color: white;"></i> Reg Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="change-password.php"><i class="fa fa-cogs" style="color: white;"></i> Settings</a>
                </li>
            </ul>
           
            <a href="logout.php" class="btn btn-danger">LOG ME OUT</a>
        </div>
    </div>
</nav>

<!-- Include Bootstrap CSS and JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script> -->
<script src="../assets/popper/popper.min.js" defer></script>
<script src="../assets/popper/popper.min.js.map.json" defer></script>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script> -->
