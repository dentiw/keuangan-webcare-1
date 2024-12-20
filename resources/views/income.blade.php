<?php
session_start();

// Dummy Data Initialization
if (!isset($_SESSION['income'])) {
    $_SESSION['income'] = [
        [
            'no' => 1,
            'date' => 'Thursday, October 24th 2024',
            'source' => 'Web Project',
            'amount' => 'Rp. 750.000'
        ],
        [
            'no' => 2,
            'date' => 'Thursday, October 24th 2024',
            'source' => 'Doorprize',
            'amount' => 'Rp. 500.000'
        ],
        [
            'no' => 3,
            'date' => 'Thursday, October 24th 2024',
            'source' => 'Design Project',
            'amount' => 'Rp. 1.250.000'
        ],
    ];
}

// Handle Add Action
if (isset($_POST['add'])) {
    $new_income = [
        'no' => count($_SESSION['income']) + 1,
        'date' => $_POST['date'],
        'source' => $_POST['source'],
        'amount' => $_POST['amount']
    ];
    $_SESSION['income'][] = $new_income;
    header('Location: '.$_SERVER['PHP_SELF']);
    exit;
}

// Handle Delete Action
if (isset($_GET['delete'])) {
    $delete_no = $_GET['delete'];
    foreach ($_SESSION['income'] as $key => $income) {
        if ($income['no'] == $delete_no) {
            unset($_SESSION['income'][$key]);
            $_SESSION['income'] = array_values($_SESSION['income']);
            break;
        }
    }
    header('Location: '.$_SERVER['PHP_SELF']);
    exit;
}

// Handle Edit Action
if (isset($_POST['edit'])) {
    $edit_no = $_POST['edit_no'];
    foreach ($_SESSION['income'] as $key => &$income) {
        if ($income['no'] == $edit_no) {
            $income['date'] = $_POST['date'];
            $income['source'] = $_POST['source'];
            $income['amount'] = $_POST['amount'];
            break;
        }
    }
    header('Location: '.$_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f8f9fa; }
        .sidebar {
            width: 250px;
            background-color: #1a73e8;
            color: white;
            position: fixed;
            height: 100%;
            padding: 20px 10px;
        }
        .sidebar a {
            color: white;
            display: flex;
            align-items: center;
            padding: 10px;
            text-decoration: none;
        }
        .sidebar a:hover { background-color: #0c47a1; border-radius: 5px; }
        .content { margin-left: 270px; padding: 20px; }
        table thead { background-color: #1a73e8; color: white; }
        .btn-add-data { position: absolute; bottom: 30px; right: 30px; }
        .icon-action { font-size: 1rem; }
        .form-container { max-width: 400px; margin: 20px auto; }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Client Portal</h4>
        <a href="dashboard"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
        <a href="#"><i class="fas fa-user-friends me-2"></i> Client</a>
        <a href="#"><i class="fas fa-video me-2"></i> Video Tutorial</a>
        <a href="#"><i class="fas fa-user me-2"></i> User</a>
        <a href="financial-statements"><i class="fas fa-file-invoice-dollar me-2"></i> Financial Statements</a>
    </div>

    <!-- Content -->
    <div class="content">
        <h3>Income</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Source of Funds</th>
                    <th>Amount of Money</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($incomes as $index => $income)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $income->date }}</td>
                        <td>{{ $income->source }}</td>
                        <td>{{ number_format($income->amount, 2) }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="{{ route('income.edit', $income->id_income) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-pen"></i>
                            </a>

                            <!-- Tombol Delete -->
                            <form action="{{ route('income.destroy', $income->id_income) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No income records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('income.create') }}" class=" btn btn-success">Buat data</a>
      

 