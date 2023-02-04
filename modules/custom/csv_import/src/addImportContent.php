<?php

namespace Drupal\csv_import;

use Drupal\node\Entity\Node;

class addImportContent {

  /*
   * function that takes data and create node
   */
  public static function addImportContentItem($item, &$context){
    $context['sandbox']['current_item'] = $item;
    $message = 'Creating ' . $item['FIRST_NAME'].' '.$item['LAST_NAME'];
    $results = array();
    create_node($item);
    $context['message'] = $message;
    $context['results'][] = $item;
  }

  /*
   * function that takes modifies managers.
   */
  public static function addManagerItem($item, &$context){
    checkForManagers($item);
  }

  function addImportContentItemCallback($success, $results, $operations) {
    
    // The 'success' parameter means no fatal PHP errors were detected. All
    // other error management should be handled using 'results'.
    if ($success) {
      $message = \Drupal::translation()->formatPlural(
        count($results),
        'One item processed.', '@count items processed.'
      );
    }
    else {
      $message = t('Finished with an error.');
    }

    \Drupal::messenger()->addMessage($message);
  }
}

// This function actually creates each item as a node as type 'Page'
function create_node($item) {
  
  $node_data['type'] = 'employee';
  $node_data['title'] = $item['FIRST_NAME'].' '.$item['LAST_NAME'];
  $node_data['field_employee_id']['value'] = $item['EMPLOYEE_ID'];
  $node_data['field_commission_pct']['value'] = $item['COMMISSION_PCT'];
  $node_data['field_department_id']['value'] = $item['DEPARTMENT_ID'];
  $node_data['field_email']['value'] = $item['EMAIL'];
  $node_data['field_first_name']['value'] = $item['FIRST_NAME'];
  $node_data['field_hire_date']['value'] = date('Y-m-d', strtotime($item['HIRE_DATE']));
  $node_data['field_job_id']['value'] = $item['JOB_ID'];
  $node_data['field_last_name']['value'] = $item['LAST_NAME'];
  $node_data['field_manager_id']['value'] = $item['MANAGER_ID'];
  $node_data['field_phone_number']['value'] = $item['PHONE_NUMBER'];
  $node_data['field_salary']['value'] = $item['SALARY'];

  // Setting a simple textfield to add a unique ID so we can use it to query against if we want to manipulate this data again.
  $node = Node::create($node_data);
  $node->setPublished(TRUE);
  $node->save();

}

/**
  * {@inheritdoc}
  */
function checkForManagers($row) {
  $managerID = $row['MANAGER_ID'];

  if($managerID) {
    $query = \Drupal::entityQuery('node')
          ->condition('type', 'employee')
          ->condition('field_employee_id', $managerID, '=');
    $nids = $query->execute();

    if($nids) {
      foreach( array_values($nids) as $nodeID ) {
        //load node object.
        $node = Node::load($nodeID);

        //set value for field
        $node->field_is_manager->value = 1;
        
        //save to update node
        $node->save();
      }
    }
  }
}
