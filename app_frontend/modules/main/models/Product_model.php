<?php
defined( 'BASEPATH' ) || exit( 'No direct script access allowed' );

class Product_model extends CI_Model {

    public function getByCategory() {
        $result = $this->db->query( "SELECT * FROM product WHERE category_id = 1 ORDER BY id DESC " )->result_array();

        return $result;
    }

    public function getOrder( $id ) {
        $result = $this->db->query( "SELECT * FROM orders WHERE id = ?", array( $id ) )->row_array();

        return $result;
    }

    public function getOrderPayment( $id ) {
        $result = $this->db->query( "SELECT * FROM orders WHERE id = ? AND payment != '' ", array( $id ) )->row_array();

        return $result;
    }

    public function getOrderCheckByCode( $code ) {
        $result = $this->db->query( "SELECT * FROM orders WHERE code = ?", array( $code ) )->row_array();

        return $result;
    }

    public function addOrder( $params ) {
        $this->db->insert( 'orders', $params );
        $inserted_id = $this->db->insert_id();

        $ord_code = "Order" . date( "ym-" ) . sprintf( "%04d", $inserted_id );

        $this->updateOrder( $inserted_id, ['code' => $ord_code] );

        return ['inserted_id' => $inserted_id, 'code' => $ord_code];
    }

    public function updateOrder( $id, $params ) {
        $this->db->where( 'id', $id );
        $response = $this->db->update( 'orders', $params );

        return $response;
    }
}