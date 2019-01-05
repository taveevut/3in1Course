<?php
defined( 'BASEPATH' ) || exit( 'No direct script access allowed' );

class Main extends MX_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model( 'main/Product_model' );

    }

    public function index() {
        $data['woman_products'] = $this->Product_model->getByCategory();

        $this->load->view( 'index', $data );

    }

    public function cart() {
        $this->load->view( 'cart' );
    }

    public function payment() {

        $this->load->view( 'payment' );
    }

    public function confirmOrder() {
        $_POST = json_decode( file_get_contents( "php://input" ), TRUE );
        $params = array(
            'details'  => serialize( $_POST['items'] ),
            'amount'   => $_POST['total'],
            'customer' => serialize( $_POST['users'] ),
            'created'  => date( "Y-m-d H:i:s" ),
            'status'   => 1,
        );

        $resp = $this->Product_model->addOrder( $params );
        if ( !empty( $resp ) ) {
            echo json_encode( ['status' => true, 'code' => $resp] );
        } else {
            echo json_encode( ['status' => false] );
        }
    }

    public function orderCheck() {
        $_POST = json_decode( file_get_contents( "php://input" ), TRUE );
        $result = $this->Product_model->getOrderCheckByCode( $_POST['code'] );

        if ( empty( $result ) ) {
            $resp = array(
                'id'     => $result['id'],
                'status' => false,
                'dialog' => array(
                    'status' => 'error',
                    'title'  => 'ไม่พบรหัสการสั่งซื้อ',
                    'text'   => 'ไม่พบรหัสการสั่งซื้อนี้ในระบบ กรุณาตรวจสอบอีกครั้ง',
                ),
            );
        } else {
            $resp = array(
                'id'     => '',
                'status' => false,
                'dialog' => array(
                    'status' => 'success',
                    'title'  => 'พบรหัสการสั่งซื้อ',
                    'text'   => 'พบรหัสการสั่งซื้อนี้ในระบบโปรดกรอกข้อมูลให้ครบถ้วน',
                ),
            );
        }

        echo json_encode( $resp );
    }

    public function paymentConfirm() {
        $_POST = json_decode( $_POST['inputText'], true );
        $id = $_POST['id'];

        $result = $this->Product_model->getOrderPayment( $id );
        if ( empty( $result ) ) {
            if ( !empty( $_FILES ) ) {
                $ext = explode( ".", $_FILES["file"]["name"] );
                $name = rand( 1, 99999 ) . time() . '.' . end( $ext );

                if ( move_uploaded_file( $_FILES['file']['tmp_name'], 'uploads/payment/' . $name ) ) {
                    unset( $_POST['id'] );

                    if ( $this->Product_model->updateOrder( $id, array( 'payment' => serialize( $_POST ) ) ) ) {
                        $resp = array(
                            'status' => true,
                            'dialog' => array(
                                'status' => 'success',
                                'title'  => 'บันทึกข้อมูลได้สำเร็จ',
                                'text'   => 'ระบบทำการบันทึกข้อมูลได้สำเร็จ',
                            ),
                        );
                    } else {
                        $resp = array(
                            'status' => false,
                            'dialog' => array(
                                'status' => 'error',
                                'title'  => 'บันทึกข้อมูลไม่สำเร็จ',
                                'text'   => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล กรุณาตรวจสอบอีกครั้ง',
                            ),
                        );
                    }
                }
            }
        } else {
            $resp = array(
                'status' => false,
                'dialog' => array(
                    'status' => 'warning',
                    'title'  => 'ได้รับการแจ้งชำระแล้ว',
                    'text'   => 'รหัสนี้ได้รับการแจ้งชำระก่อนหน้านี้แล้วขอบคุณครับ',
                ),
            );
        }

        echo json_encode( $resp );
    }
}