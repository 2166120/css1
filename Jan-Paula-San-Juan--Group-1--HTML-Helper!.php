<?php
class HTML_Helper {
  public $first_name;
  public $last_name;
  public $nick_name;
  public function __construct() {
    $this->first_name="Michael";
	$this->last_name="Choi";
	$this->nick_name="Sensei";
  }
  public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->property;
    }
  }
  public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }
    return $this;
  }
  public function print_table() {
?>
		<table>
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Nick Name</th>
				</tr>
			<thead>
			<tbody>
				<tr>
					<td><?= $this->first_name ?></td>
					<td><?= $this->last_name ?></td>
					<td><?= $this->nick_name ?></td>
				</tr>
			</tbody>
		</table>
<?php
	return $this;
  }
  public function print_select($select, $array) {
?>
			<select name="<?= $select ?>">
<?php	foreach($array as $value) {	?>
				<option value="<?= $value ?>"><?= $value ?></option>
<?php	}	?>
			</select>
<?php
	return $this;
  }
}
$html_helper=new HTML_Helper();
$html_helper->print_table();
$sample_array=array("CA", "WA", "UT", "TX", "AZ", "NY");
$html_helper->print_select("state", $sample_array);
?>