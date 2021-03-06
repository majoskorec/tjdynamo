insert into dynamo.dynamo_user (
  `id`,
	`username`,
	`username_canonical`,
	`email`,
	`email_canonical`,
	`enabled`,
	`salt`,
	`password`,
	`last_login`,
	`confirmation_token`,
	`password_requested_at`,
	`roles`,
	`chat_color`,
	`first_name`,
	`last_name`,
	`birth_date`,
	`birth_place`,
	`address`,
	`phone`,
	`avatar`,
	`member_from`,
	`member_till`,
	`note`,
	`send_emails`,
	`created_at`,
  `membership`
)
select
  u.PERSONKY,
  u.LOGIN,
  u.LOGIN,
  p.EMAIL,
  p.EMAIL,
  1,
  null,
  u.PASSWORD,
  u.LASTLOGIN,
  null,
  null,
  if (u.IS_ADMIN = 1, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 'a:0:{}'),
  u.CHAT_COLOR,
  p.GIVENNAME,
  p.FAMILYNAME,
  p.BIRTHDATE,
  p.BIRTHPLACE,
  p.ADDRESS,
  p.PHONE,
  p.PHOTO,
  p.FROM_DATE,
  p.TILL,
  p.NOTE,
  p.SEND_MAILS,
  u.REGDATE,
  p.MEMBERSHIP
from dynamo_old.USER u
join dynamo_old.PERSON p on u.PERSONKY = p.PERSONKY;