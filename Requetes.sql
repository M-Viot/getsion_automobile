-- Écrire la requête SQL permettant de récupérer tous les auteurs commençant par V
select nom 
from auteur 
where nom like 'V%';
-- Écrire la requête SQL permettant de récupérer tous les livres de Victor Hugo, trié par ordre alphabétique
select l.nom  
from livre l 
join auteur a on l.auteur_id = a.id  
where a.nom = 'Victor Hugo' 
order by l.nom  ;
-- Écrire la requête SQL permettant de connaître les magasins ayant vendu au moins 1200 livres;
select m.nom, sum(v.qte_vendu) cumul_ventes 
from vente v join magasin m on  v.magasin_id = m.id 
group by m.id 
having cumul_ventes > 1200;
-- Écrire la requête SQL permettant de connaître les 5 auteurs ayant vendu le plus, avec comme données, le nom de l’auteur et le nombre total de ventes
select a.nom, sum(v.qte_vendu) as cumul_ventes  
from vente v 
join livre l on v.livre_id = l.id
join auteur a on l.auteur_id  = a.id
group by a.id
order by cumul_ventes desc 
limit 5;
-- Ecrire la requête SQL permettant de récupérer pour chaque magasin, l'auteur qui a vendu le plus de livre et le nombre de vente correspondant
select m.nom, tmp.nomAut, tmp.cumul
from magasin m
inner join (
	select sum(qte_vendu) as cumul,a.nom as nomAut , m.nom as nomMag2 , m.id as mag
	from vente v
	join livre l on v.livre_id = l.id 
	join auteur a on l.auteur_id  = a.id
	join magasin m on v.magasin_id = m.id 
	group by a.id, m.id
	order by  cumul desc
)tmp on m.id = tmp.mag
group by m.id
;   
-- Écrire la requête permettant de remonter les magasins vendant "Les Misérables" plus que la moyenne de vente de ce livre de tous les magasins
select m.nom , v.qte_vendu, (
	select avg(v.qte_vendu)  
	from livre l 
	join auteur a on l.auteur_id = a.id 
	join vente v on l.id = v.livre_id 
	join magasin m on v.magasin_id = m.id 
	where l.nom = 'Les Misérables'
)as moyenne
from livre l 
join auteur a on l.auteur_id = a.id 
join vente v on l.id = v.livre_id 
join magasin m on v.magasin_id = m.id 
where l.nom = 'Les Misérables'
having v.qte_vendu > moyenne