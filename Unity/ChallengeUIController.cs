using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ChallengeUIController : MonoBehaviour
{
    public TextAsset ChallengeJson;
    public int ChallengeMatchListArraySize;
    
    [System.Serializable]
    public class ChallengeData
    {
        public int ChallengeId,
            ChallengeSet,
            CurrentStatus,
            TargetRun,
            TargetBall,
            SetWicket,
            SetRun,
            SetOver,
            Status,
            RewardAmount,
            RewardStatus;

        public string ChallengeTitle,
            MatchDate,
            SeriesName,
            MatchLocation,
            TeamA,
            TeamB,
            BatsmanA,
            BatsmanB,
            BatsmanC,
            BowlerA,
            BowlerB,
            BowlerC,
            MatchInfo;

    }
    
    [System.Serializable]
    public class ChallengeMatchList
    {
        public ChallengeData[] ChallengeProfiles;

    }
    public ChallengeMatchList MyChallengeMatchList = new ChallengeMatchList();
    void Start()
    {
        MyChallengeMatchList = JsonUtility.FromJson<ChallengeMatchList>(ChallengeJson.text);
        ChallengeMatchListArraySize = MyChallengeMatchList.count
    }

    // Update is called once per frame
    void Update()
    {
        
    }
}
