use fxdb

CREATE TABLE IF NOT EXISTS trade (
    id INT AUTO_INCREMENT,
    trading_date DATE,
    settlement_date DATE,
    currency_pair_id INT,
    trade_type INT,
    quantity INT,
    entry_price DECIMAL(8,5),
    exit_price DECIMAL(8,5),
    stop_loss INT,
    profit DECIMAL(15,5),
    comment TEXT,
    image_id INT,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS currency_pair (
    id INT,
    currency_pair VARCHAR(7),
    PRIMARY KEY(id)
);

insert into currency_pair values(1, 'USD/JPY');
insert into currency_pair values(2, 'EUR/JPY');
insert into currency_pair values(3, 'GBP/JPY');
insert into currency_pair values(4, 'AUD/JPY');
insert into currency_pair values(5, 'NZD/JPY');
insert into currency_pair values(6, 'CAD/JPY');
insert into currency_pair values(7, 'EUR/USD');
insert into currency_pair values(8, 'GBP/USD');
insert into currency_pair values(9, 'AUD/USD');
