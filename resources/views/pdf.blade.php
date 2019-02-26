<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Classes Information.pdf</title>
	<style type="text/css">
		table, th, tr, td{
			border: 1px solid black;
			border-collapse: collapse;
			text-align: center;
			padding: 10px;
		}
	</style>
</head>
<body>
	<h2>Classes Information</h2>
	<table class="table-list">
		<tr>
            <th>Name</th>
            <th>Teacher</th>
            <th>Students</th>
        </tr>
        @foreach($classrooms_data as $classroom)
        <tr>
            <td>{{ $classroom[1] }}</td>
            <td>{{ $classroom[2] }}</td>
            <td>{{ $classroom[3] }}</td>
        </tr>
        @endforeach
	</table>
</body>
</html>