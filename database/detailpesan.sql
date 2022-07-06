DELIMITER $$
 
CREATE TRIGGER `batal_transaksi` AFTER DELETE ON `detail_transaksi` FOR EACH ROW BEGIN
 
UPDATE masakan SET stok = stok + OLD.qty
 
WHERE id_masakan = OLD.id_masakan;
 
END
 
$$
 
DELIMITER ;
 
DELIMITER $$
 
CREATE TRIGGER `tambah_transaksi` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN
 
UPDATE masakan SET stok = stok - NEW.qty
 
WHERE id_masakan = NEW.id_masakan;
 
END
 
$$
 
DELIMITER ;