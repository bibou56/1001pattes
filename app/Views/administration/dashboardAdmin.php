<?php include('app/Views/front/header.php') ?>

<main class="content-dashboardAdmin container">

    <div class="page-title">
        <p><img src="./app/Public/front/images/dogprint-black.png" alt="empreinte de patte de chien"></p>
        <h1>Votre tableau de bord</h1>
        <p><img src="./app/Public/front/images/catprint-black.png" alt="empreinte de patte de chat"></p>
    </div>

    <section id="allMails">
        <p id="countMails">Vous avez <span><?php $totalMail = $mailCount->fetch(); echo $totalMail[0]; ?></span> messages</p>
        <table id="tableMails">
            <thead>
                <tr>
                    <th>Nom et prénom</th>
                    <th class="mailAddress">email</th>
                    <th class="mailObject">Objet du message</th>
                    <th>Date d'envoi</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach($totalMessages as $messages){ ?>
                    <tr>
                        <td><?= $messages['lastname'], " " , $messages['firstname'] ?></td>
                        <td class="mailAddress"><?= $messages['mail'] ?></td>
                        <td class="mailObject"><?= $messages['objet'] ?></td>
                        <td><?= $messages['date'] ?></td>
                        <td class="UD-mail"><a href="indexAdmin.php?action=eachMail&id=<?= $messages['id']; ?>" title="va vers la consultation du mail"><img src="./app/Public/front/images/yeux.png" alt="logo oeil"></a></td>
                    </tr>
                <?php } 
                ?>
            </tbody>
        </table>
    </section>

    <section id="yourUsers">
        <p id="countUsers">Vous avez <span><?php $totalUsers = $userCount->fetch(); echo $totalUsers[0]; ?></span> abonnés</p>
        <table id="tableUsers">
            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th class="mailAddress">email</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach($totalUser as $users){ 
                    if($users['role'] == 0){?>
                    <tr>
                        <td><?= $users['nickname'] ?></td>
                        <td class="mailAddress"><?= $users['mail'] ?></td>
                        <td class="deleteUser">
                            <a href="indexAdmin.php?action=deleteUser&id=<?= $users['id']; ?>" title="supprime l'abonné'"><img src="./app/Public/front/images/bin.png" alt="logo poubelle"></a>
                        </td>
                    </tr>
                <?php } 
                } ?>
            </tbody>
        </table>
    </section>
    
</main>

<?php include('app/Views/front/footer.php') ?>