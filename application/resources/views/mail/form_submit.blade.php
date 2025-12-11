<style>
    table {
        font-family: Arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

<table>
    <tbody>
        <tr>
            <td>First Name</td>
            <td>{{ $first_name }}</td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td>{{ $last_name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $email }}</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>{{ $phone }}</td>
        </tr>
        <tr>
            <td>Best Execution</td>
            <td>{{ $best_execution ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
            <td>Custom Execution</td>
            <td>{{ $custom_execution ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
            <td>Message</td>
            <td>{{ $message }}</td>
        </tr>
    </tbody>
</table>
