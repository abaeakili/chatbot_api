# HealthCareBot -- Your personal health assistant

Chat API

#https://api.infermedica.com/v2/parse

# Input
{
    "text": "i am suffering from headache today "
}

# Output
{
    "mentions": [
        {
            "orth": "headache",
            "id": "s_21",
            "type": "symptom",
            "choice_id": "present",
            "name": "Headache"
        }
    ]
}

# https://api.infermedica.com/v2/diagnosis
# Input
{
  "sex": "male",
  "age": 30,
  "evidence": [
    {
      "id": "s_1193",
      "choice_id": "present"
    },
    {
      "id": "s_1542",
      "choice_id": "present"
    }
  ]
}

# Output
{
    "question": {
        "type": "single",
        "text": "Has your headache started suddenly?",
        "items": [
            {
                "id": "s_1542",
                "name": "Headache, sudden",
                "choices": [
                    {
                        "id": "present",
                        "label": "Yes"
                    },
                    {
                        "id": "absent",
                        "label": "No"
                    },
                    {
                        "id": "unknown",
                        "label": "Don't know"
                    }
                ]
            }
        ],
        "extras": {}
    },
    "conditions": [
        {
            "id": "c_49",
            "name": "Migraine",
            "probability": 0.203
        }
    ],
    "extras": {}
}
