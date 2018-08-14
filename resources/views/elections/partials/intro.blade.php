<div class="xs-event-content">
    <h4>Voting Info</h4>
    <p>Every harvest, we hold an election to decided who will serve on the Bitcorn Foundation. Candidates can nominate themselves and state their platform. Holders of CROPS are distributed a voting token with which they can cast their votes. Nominations start as soon as the last election ends and the election winners are decided at a given block height, roughly approximating the day after the last harvest.</p>
</div>
<div class="row xs-mb-60">
    <div class="col-md-6 xs-about-feature">
        <h3>How to Vote</h3>
        <p>Cast your vote by sending {{ $election->asset->name }} to <a href="https://xcpfox.com/address/1BitcornFoundationVotingxxy262cTk">1BitcornFoundationVotingxxy262cTk, making sure to use the candidate's vote code as the memo.</p>
    </div>
    <div class="col-md-6 xs-about-feature">
        <h3>How it Works</h3>
        <p>Each candidate is paired with a unique code, like "E2C3" (without the quotes). We treat asset sends as cast ballots and simply tally up the votes.</p>
    </div>
</div>