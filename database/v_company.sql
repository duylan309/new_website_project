create view v_company as
select
    c1.company_id,
    c1.name as company_name,
    c1.url as company_url,
    u1.user_id as employer_user_id,
    u1.name as employer_name,
    u1.email as employer_email,
    u1.status as employer_status,
    u1.is_deleted as employer_is_deleted
from m_company as c1
inner join m_user as u1 on u1.user_id = c1.employer_user_id;
