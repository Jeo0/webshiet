drop database pos_applicationdb;
create database pos_applicationdb;
use pos_applicationdb;

create table salestbl (
    cash_given          double,
    customer_change     double,
    discounted_amount   double,
    discount_amount     double,
    discount_option     varchar(50),
    employee_no         varchar(30),
    item_name           varchar(100),
    price               double,
    quantity            int,
    total_discounted_amount     double,
    total_discount_given        double,
    total_quantlty              int,
    id                  int auto_increment primary key
);

create table user_accounttbl (
    confirm_password    varchar(50),
    employee_no         varchar(30),
    password            varchar(50),
    privilege           int,
    username            varchar(50),
    id                  int auto_increment primary key
);

create table personal_infotbl (
    address_linel       text,
    address_line2       text,
    birth_date          date,
    civil_status        varchar(30),
    contact_no          varchar(30),
    country             varchar(50),
    department          varchar(50),
    designation         varchar(50),
    email_address       varchar(50),
    employee_status     varchar(30),
    fname               varchar(50),
    gender              varchar(50),
    lname               varchar(50),
    mname               varchar(50),
    municipality        varchar(50),
    nationality         varchar(30),
    other_social_media_account      varchar(50),
    pay_date            date,
    picpath             text,
    qualified_dependent_status      varchar(50),
    social_media_account_id         varchar(50),
    state_province      varchar(50),
    suffix              varchar(10),
    zip_code            int,
    id                  int         auto_increment  unique,
    employee_no         varchar(30) primary key
);

create table incometbl (
    basic_income    double,
    basic_num_hrs   double,
    basic_rate_hour double,
    employee_no     varchar(30),
    gross_income    double,
    hono_income     double,
    hono_num_hrs    double,
    hono_rate_hour  double,
    income_date     varchar(50),
    net_income      double,
    other_income    double,
    other_num_hrs   double,
    other_rate_hour double,
    id              int auto_increment primary key
);

create table deductiontbl(
    deduction_date          varchar(50),
    employee_no             varchar(30),
    faculty_savings_deposit double,
    faculty_savings_loan    double,
    income_tax_contri       double,
    other_loans             double,
    pagibig_contri          double,
    pagibig_loan            double,
    philHealth_contri       double,
    salery_loan             double,
    sss_contri              double,
    sss_loan                double,
    total_deduction         double,
    id                      int auto_increment primary key
);
