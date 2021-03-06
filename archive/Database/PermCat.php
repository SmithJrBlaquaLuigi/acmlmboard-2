<?php

require_once('lib/Database/DBRecord.php');

class PermCat extends DBRecord
{    
  //names
  static protected $_table = "permcat";
  //normal fields
  protected $_title, $_sortorder;
  //foreign keys

  public function title() {
    return $this->_title;
  }
  public function setTitle($value) {
    $this->_title = $value;
    $this->setDirty(true);
  }
  public function sortorder() {
    return $this->_sortorder;
  }
  public function setSortorder($value) {
    $this->_sortorder = $value;
    $this->setDirty(true);
  }

  public function commit() {
    $res = $this->query("INSERT OR REPLACE INTO ".self::$_table." (id,title,description,permcat_id) VALUES (?,?,?,?)", array(
      $this->_id,
      $this->_title,
      $this->_description,
      $this->_permcat_id
    ));

    if ($res) return true;
    else return false;
  }

  public static function createFromRow($row) {
    $r = new self();
    $r->_id = $row['id'];    
    $r->_title = $row['title'];
    $r->_sortorder = $row['sortorder'];
    return $r;
  }

}
?>
