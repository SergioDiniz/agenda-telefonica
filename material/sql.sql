create table agenda(
	ID int auto_increment primary key,
    nomeResponsavel varchar(255) not null, 
    emailResponsavel varchar(255) not null, 
    nomeEstabelecimento varchar(255) not null, 
    telefone int unique not null, 
    descricao varchar(255), 
    Rua varchar(255), 
    Numero int,
    Complemento varchar(255), 
    ativo boolean not null, 
    codigo varchar(255) unique not null, 
    categoria varchar(255) not null, 
    dataCastro date not null,
    prioridade int not null
);

/* INSERINDO */
insert into agenda (nomeResponsavel, emailResponsavel, nomeEstabelecimento, telefone, descricao, Rua, Numero, Complemento, ativo, codigo, categoria, dataCastro, prioridade) 
value ("sergio", "sergiodinizsh@gmail.com", "Desevolvimento de Software", "93551477", "Desenvolvedor de Software", "Pedro Muniz", 71, "rua da quadra", true, "asd", "software", "2014-12-05", 3);


/* INSERINDO */
insert into agenda (nomeResponsavel, emailResponsavel, nomeEstabelecimento, telefone, descricao, Rua, Numero, Complemento, ativo, codigo, categoria, dataCastro, prioridade) 
value ("sergio", "sergiodinizsh@gmail.com", "Desevolvimento de Software 1", "93551474", "Desenvolvedor de Software", "Pedro Muniz", 71, "rua da quadra", true, "asd1", "software", "2014-12-05", 1);


/* INSERINDO */
insert into agenda (nomeResponsavel, emailResponsavel, nomeEstabelecimento, telefone, descricao, Rua, Numero, Complemento, ativo, codigo, categoria, dataCastro, prioridade) 
value ("sergio", "sergiodinizsh@gmail.com", "Desevolvimento de Software 2", "83551477", "Desenvolvedor de Software", "Pedro Muniz", 71, "rua da quadra", true, "qeqwe3", "software", "2014-12-05", 1);


/* INSERINDO */
insert into agenda (nomeResponsavel, emailResponsavel, nomeEstabelecimento, telefone, descricao, Rua, Numero, Complemento, ativo, codigo, categoria, dataCastro, prioridade) 
value ("joelson", "joelson@gmail.com", "professor perticular", "55545655", "Professor de Historia Perticular", "Pedro Muniz", 71, "rua da quadra", false, "xcvxc5", "Reforço", "2014-12-05", 3);


/* INSERINDO */
insert into agenda (nomeResponsavel, emailResponsavel, nomeEstabelecimento, telefone, descricao, Rua, Numero, Complemento, ativo, codigo, categoria, dataCastro, prioridade) 
value ("joelson", "joelson@gmail.com", "professor perticular", "55545255", "Professor de Historia Perticular", "Pedro Muniz", 71, "rua da quadra", true, "dfgdf6", "Reforço", "2014-12-05", 3);


/* Error Code: 1175, 
essa linha é nescessaria para poder deletar e 
fazer alterações sem ser pelo ID */
set SQL_SAFE_UPDATES = 0;


/* PESQUISANDO */
select * from agenda where ativo = 1 and (nomeResponsavel like '%professor%' or nomeEstabelecimento like '%professor%' or descricao like '%professor%' or categoria like '%professor%') order by prioridade asc, nomeEstabelecimento asc;


select * from agenda where ativo = 1  order by prioridade desc, nomeEstabelecimento asc;


/* ALTERANDO DADOS */
update agenda set nomeEstabelecimento = 'Dev Software', telefone = '99776655', descricao = 'Dev Software', Rua = 'Pedro Muniz', Numero = '71', Complemento = 'rua da quadra', categoria = 'software' where codigo = 'asd';

/* DELETANDO DADOS */
delete from agenda where codigo = 'Dfgdf6';





/* TESTE PARA MONITORAR PESQUISAS */
select a.nomeResponsavel, count(a.nomeResponsavel) from agenda a where nomeResponsavel like 'sergio' group by a.nomeResponsavel;