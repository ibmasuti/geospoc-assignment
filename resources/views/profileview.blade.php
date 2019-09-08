<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>
</head>
<body>

<h2>{{ $jobseeker->name }}'s Profile</h2>

<table style="width:100%">
  <tr>
    <th>Name:</th>
    <td>{{ $jobseeker->name }}</td>
  </tr>
  <tr>
    <th>Email:</th>
    <td>{{ $jobseeker->email }}</td>
  </tr>
  <tr>
    <th>Web Address</th>
    <td>{{ $jobseeker->webaddress }}</td>
  </tr>
    <tr>
   <th>Cover letter</th>
    <td>{{ $jobseeker->coverletter }}</td>
  </tr>
    <tr>
    <th>CV name</th>
    <td> <a href="/download/{{ $jobseeker->cvname }}">{{ $jobseeker->cvname }}</a></td>
  </tr>
    <tr>
    <th>Like working</th>
    <td>{{ $jobseeker->like_working }}</td>
  </tr>
    <tr>
    <th>IP Address</th>
    <td>{{ $jobseeker->ip_address }}</td>
  </tr>
    </tr>
    <tr>
    <th>Time created</th>
    <td>{{ $jobseeker->created_at }}</td>
  </tr>
</table>

<h2>LOCATION</h2>

<table style="width:100%">
  <tr>
    <th>country Name</th>
    <td>{{ $position->countryName }}</td>
  </tr>
  <tr>
    <th>Region Name</th>
    <td>{{ $position->regionName  }}</td>
  </tr>
  <tr>
    <th>City Name</th>
    <td>{{ $position->cityName }}</td>
  </tr>
  <tr>
    <th>Latitude</th>
    <td>{{ $position->latitude }}</td>
  </tr>
  <tr>
    <th>Longitude</th>
    <td>{{ $position->longitude }}</td>
  </tr>
  <tr>
    <th>postalCode</th>
    <td>{{ $position->postalCode }}</td>
  </tr>
</table>

<a href="javascript:history.back()" class="btn btn-primary">Back</a>



</body>
</html>
