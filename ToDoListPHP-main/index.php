<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';
include 'templates/header.php';

// Fetch all tasks
$tasks = getTasks($conn);
?>

<div class="row">
    <div class="col-md-12">

        <!-- ADD TASK FORM -->
        <form action="add_task.php" method="POST" class="input-group mb-3">
            <input
                type="text"
                class="form-control"
                placeholder="New Task"
                name="task"
                required
            >
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    Add Task
                </button>
            </div>
        </form>

        <!-- TASK LIST -->
        <ul class="list-group mt-3">

            <?php if ($tasks && $tasks->num_rows > 0): ?>
                <?php while ($row = $tasks->fetch_assoc()): ?>

                    <li class="list-group-item d-flex justify-content-between align-items-center">

                        <!-- TASK TEXT -->
                        <span style="<?php
                            echo ($row['status'] === 'completed')
                                ? 'text-decoration: line-through; color: gray;'
                                : '';
                        ?>">
                            <?php echo htmlspecialchars($row['task']); ?>
                        </span>

                        <!-- ACTION BUTTONS -->
                        <div>
                            <?php if ($row['status'] !== 'completed'): ?>
                                <a href="complete.php?id=<?php echo $row['id']; ?>"
                                   class="btn btn-success btn-sm">
                                    ✔
                                </a>
                            <?php endif; ?>

                            <a href="delete_task.php?id=<?php echo $row['id']; ?>"
                               class="btn btn-danger btn-sm">
                                ✖
                            </a>
                        </div>

                    </li>

                <?php endwhile; ?>
            <?php else: ?>
                <li class="list-group-item text-muted">
                    No tasks yet
                </li>
            <?php endif; ?>

        </ul>

    </div>
</div>

<?php include 'templates/footer.php'; ?>
