delete from workactivity where riskid not in (SELECT id FROM `riskassessment`)
