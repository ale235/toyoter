ALTER TABLE precios ADD COLUMN precio_taller_co DOUBLE(8,2);

UPDATE precios SET precio_taller_co = 0;

alter table precios CHANGE precio_personalizado precio_taller VARCHAR(225);
