<?php
//	connect to database
include 'conn.php';
$db->setFetchMode(ADODB_FETCH_ASSOC);
$params = [
    'bulanan' => 1,
    'stdate' => date("Y-m-01"),
    'edate' => date("Y-m-t"),
    'lokasi' => null,
    'lokasi_id' => null,
    'kategori' => null,
    'product_id' => null,
    'inventory_id' => null
];

// # 1. Dapatkan lokasi
$sql    = " select 
                ";
$rs = $db->getAll($sql . $where . $setLimit);
$totalcount = sizeOf($db->getAll($sql . $where));




 
/**
 * note
 *          params : {
 *              STDATE,
 *              EDATE,
 *              LOKASI,
 *              LOKASI_ID,
 *              KATEGORI,
 *              PRODUCT_ID,
 *              INVENTORY_ID
 *          }
 * 
 * 1. mendapatkan transaksi invesa
 *     sp display_part_for_simulation('STDATE','DATE','LOKASI','KATEGORI',$params['bulanan']);
 * 
 * 2. perhitungan pemasukan
 *      select ifnull(sum(product_qty),0) from stock_move
 *      WHERE cast(DATE AS DATE)>=:stdate AND cast(DATE AS DATE)<=:edate
 *      and partner_id=:LOKASI_ID AND owner_id=:KATEGORI and product_id=:PRODUCT_ID
 *      and move_type='input'
 * 
 *  3. perhitungan pengeluaran
 *      select ifnull(sum(product_qty),0) from stock_move
 *      WHERE cast(DATE AS DATE)>=:STDATE AND cast(DATE AS DATE)<=:EDATE
 *      and partner_id=:LOKASI_ID AND owner_id=:KATEGORI and product_id=:PRODUCT_ID
 *      and move_type='output'
 * 
 *  4. perhitungan saldo awal
 *      select case 
 *          when (IFNULL(sum(adjust_qty),0)) <> 0  
    *          then (IFNULL(sum(product_qty),0)) 
    *          else (IFNULL(sum(theoretical_qty),0))
 *          end, 
 *          ifnull(sum(adjust_qty),0),
 *          ifnull(sum(product_qty),0),
 *          remark
 *      from stock_inventory_line
 *      WHERE inventory_id=:INVENTORI_ID 
 *      and partner_id=:LOKASI 
 *      and location_id=:KATEGORI
 *      and product_id=:PRODUCT_ID LIMIT 1
 * 
 *  ##### step #####
 *  1. dapatkan lokasi 
 *  2. dapatkan kategori
 *  3. looping dan insert into table temporary
 *  4. ambil data yang sesuai per 
 *  5. task scheduler
 */


?>

