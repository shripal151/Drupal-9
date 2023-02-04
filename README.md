<h1>Drupal 9</h1>

<h2>PART 1: Create a new employee content type to store all information about employees from a CSV. Uploading CSV onto the drupal site must create its corresponding nodes.</h2>

<p>I have created custom module (Under modules/custom) named "csv_import" and had create custom admin form in it.</p>
<p>That form will have ability to upload csv file and will create nodes after click on Import csv button.</p>

<p>I have used this approach to get better result for node creation. Also, I have made function to run this in a batch process.</p>

<p><b>Please note that, I have made this code into my hosting to you can easily check it's result from the following url</b></p>

<h3>SAMPLE URL:</h3>
<p>1. FORM: http://o2ebrands.shripalzala.com/admin/config/development/import-csv </p>

<h2>PART 2: Create a filter to display all managers on the page “/employees/manager” and “employees/all” must show all employees.</h2>

<p>I have created views for it and displayed result in table format with pagination.</p>
<p>I have used this approach because views are most powerful tool to show data and also it can filter easiliy.</p>

<p><b>Please note that to differentiate employee & managers, I have put some piece of code to find managers from csv and I had created one boolean field for managers from admin dashboard. So, if manager finds from csv then it will enable checkbox from code. This will be used inside filter criteria in views to differentiate managers & employees.</b></p>

<h3>SAMPLE URL:</h3>
<p> EMPLOYEE LIST: http://o2ebrands.shripalzala.com/employees/all </p>
<p> MANAGERS LIST: http://o2ebrands.shripalzala.com/employees/manager </p>
