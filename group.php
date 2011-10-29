<?php
require_once('simpletest/autorun.php');
require_once('includes/model/group.php');

class TestOfGroup extends UnitTestCase {
    function testAddGetDeleteGroup() {
        $group = Group::add('simpletest',array());
        $getgroup = new Group(array("name" => 'simpletest'));
        $this->assertTrue(is_object($group));
        $this->assertTrue(is_object($getgroup));
        $sql = SQL::current();
        $group_id = $sql->latest("groups");
        Group::delete($group_id);
        $this->assertFalse(new Group(array("name" => 'simpletest')));
    }
}
?>