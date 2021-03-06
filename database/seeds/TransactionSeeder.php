<?php

use Illuminate\Database\Seeder;
use App\Transaction;
use App\DetailTransaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::query()->truncate();
        DetailTransaction::query()->truncate();

        $kodetransaksi   = array('T001', 'T002', 'T003', 'T004', 'T005', 'T006', 'T007', 'T008', 'T009', 'T010', 'T011', 'T012', 'T013', 'T014', 'T015', 'T016', 'T017', 'T018', 'T019', 'T020', 'T021', 'T022', 'T023', 'T024', 'T025', 'T026', 'T027', 'T028', 'T029', 'T030', 'T031', 'T032', 'T033', 'T034', 'T035', 'T036', 'T037', 'T038', 'T039', 'T040', 'T041', 'T042', 'T043', 'T044', 'T045', 'T046', 'T047', 'T048', 'T049', 'T050','T051','T052','T053','T054', 'T055','T056','T057','T058','T059','T060', 'T061', 'T062', 'T063', 'T064', 'T065', 'T066', 'T067', 'T068', 'T069', 'T070', 'T071', 'T072', 'T073', 'T074', 'T075', 'T076', 'T077', 'T078', 'T079', 'T080', 'T081', 'T082', 'T083', 'T084', 'T085', 'T086', 'T087', 'T088', 'T089', 'T090', 'T091', 'T092', 'T093', 'T094', 'T095', 'T096', 'T097', 'T098', 'T099', 'T100', 'T101', 'T102', 'T103', 'T104', 'T105', 'T106', 'T107', 'T108', 'T109', 'T110', 'T111', 'T112', 'T113', 'T114', 'T115', 'T116', 'T117', 'T118', 'T119', 'T120', 'T121', 'T122', 'T123', 'T124', 'T125', 'T126', 'T127', 'T128', 'T129', 'T130', 'T131', 'T132', 'T133', 'T134', 'T135', 'T136', 'T137', 'T138', 'T139', 'T140', 'T141', 'T142', 'T143', 'T144', 'T145', 'T146', 'T147', 'T148', 'T149', 'T150', 'T151', 'T152', 'T153', 'T154', 'T155', 'T156', 'T157', 'T158', 'T159', 'T160', 'T161', 'T162', 'T163', 'T164', 'T165', 'T166', 'T167', 'T168', 'T169', 'T170', 'T171', 'T172', 'T173', 'T174', 'T175', 'T176', 'T177', 'T178', 'T179', 'T180', 'T181', 'T182', 'T183', 'T184', 'T185', 'T186', 'T187', 'T188', 'T189', 'T190', 'T191', 'T192', 'T193', 'T194', 'T195', 'T196', 'T197', 'T198', 'T200');

        $total   = array('10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000','10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000');
       
        for($i=0 ; $i<count($kodetransaksi); $i++){
            $transaction = new Transaction(array(
                'kodetransaksi'    => $kodetransaksi[$i],
                'total'    => $total[$i],
            ));

            $transaction->save();
        }

        $kodetransaksi   = array('T001', 'T002', 'T003', 'T004', 'T005', 'T006', 'T007', 'T008', 'T009', 'T010', 'T011', 'T012', 'T013', 'T014', 'T015', 'T016', 'T017', 'T018', 'T019', 'T020', 'T021', 'T022', 'T023', 'T024', 'T025', 'T026', 'T027', 'T028', 'T029', 'T030', 'T031', 'T032', 'T033', 'T034', 'T035', 'T036', 'T037', 'T038', 'T039', 'T040', 'T041', 'T042', 'T043', 'T044', 'T045', 'T046', 'T047', 'T048', 'T049', 'T050','T051','T052','T053','T054', 'T055','T056','T057','T058','T059','T060', 'T061', 'T062', 'T063', 'T064', 'T065', 'T066', 'T067', 'T068', 'T069', 'T070', 'T071', 'T072', 'T073', 'T074', 'T075', 'T076', 'T077', 'T078', 'T079', 'T080', 'T081', 'T082', 'T083', 'T084', 'T085', 'T086', 'T087', 'T088', 'T089', 'T090', 'T091', 'T092', 'T093', 'T094', 'T095', 'T096', 'T097', 'T098', 'T099', 'T100', 'T101', 'T102', 'T103', 'T104', 'T105', 'T106', 'T107', 'T108', 'T109', 'T110', 'T111', 'T112', 'T113', 'T114', 'T115', 'T116', 'T117', 'T118', 'T119', 'T120', 'T121', 'T122', 'T123', 'T124', 'T125', 'T126', 'T127', 'T128', 'T129', 'T130', 'T131', 'T132', 'T133', 'T134', 'T135', 'T136', 'T137', 'T138', 'T139', 'T140', 'T141', 'T142', 'T143', 'T144', 'T145', 'T146', 'T147', 'T148', 'T149', 'T150', 'T151', 'T152', 'T153', 'T154', 'T155', 'T156', 'T157', 'T158', 'T159', 'T160', 'T161', 'T162', 'T163', 'T164', 'T165', 'T166', 'T167', 'T168', 'T169', 'T170', 'T171', 'T172', 'T173', 'T174', 'T175', 'T176', 'T177', 'T178', 'T179', 'T180', 'T181', 'T182', 'T183', 'T184', 'T185', 'T186', 'T187', 'T188', 'T189', 'T190', 'T191', 'T192', 'T193', 'T194', 'T195', 'T196', 'T197', 'T198', 'T200');

        $nama_produk = array('Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau','Teh Pucuk','Yakult','Adem Sari','Yogurt','Coca Cola','Fanta','Pepsi','Susu Ultra','Good Day','Es Kacang Hijau');

        $qty   = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10');
       
        for($i=0 ; $i<count($kodetransaksi); $i++){
            $detailtransaction = new DetailTransaction(array(
                'kodetransaksi' => $kodetransaksi[$i],
                'nama_produk'   => $nama_produk[$i],
                'qty'           => $qty[$i],
            ));

            $detailtransaction->save();
        }
    }
}
