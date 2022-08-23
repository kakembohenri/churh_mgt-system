<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>

    <?php include('navbar.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('sidebar.php'); ?>
            <div class="span3" id="addmembers">
                <?php include('edit_church_profile_form.php'); ?>
                <?php include('notification.php')
                ?>
            </div>


        </div>
    </div>
    <?php include('footer.php'); ?>
    </div>
    <?php include('script.php'); ?>






    <script type="text/javascript">
        let selectedMembers = [];
        const memberChecks = document.querySelectorAll(".member-check");

        memberChecks.forEach(check => {
            check.addEventListener('change', ev => {

                memberId = ev.target.value;

                if (ev.target.checked) {
                    if (!selectedMembers.includes(memberId)) {
                        selectedMembers.push(memberId);

                    }
                } else {

                    let finalMembers = [];
                    for (var index = 0; index < selectedMembers.length; index++) {
                        if (selectedMembers[index] !== memberId) {
                            finalMembers[index] = selectedMembers[index];
                        }
                    }

                    selectedMembers = finalMembers;

                }

                selectedMembers

                $.ajax({
                    url: '../data/add_service_attendants.php',
                    type: 'get'
                })

            })
        })
    </script>
</body>

</html>